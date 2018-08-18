<?php

namespace App\Http\Controllers;

use App\Asset;
use App\Cause;
use Auth, Storage;
use App\Events\CauseReviewedEvent;
use App\Http\Requests\Causes\StoreRequest;
use Illuminate\Http\Request;

class CausesController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
        $this->middleware('can:view,cause')->only('show');
        $this->middleware('can:update,cause')->only('update');
        $this->middleware('can:delete,cause')->only('destroy');
    }

    /**
     * Causes Index
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $ended_causes = Cause::ended()->get();
        $active_causes = Cause::popular()->get();

        return view('causes.index', compact('active_causes', 'ended_causes'));
    }

    /**
     * Show Cause
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cause  $cause
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Cause $cause)
    {
        $pledges = $cause->pledges()->take(10)->latest()->get();

        return view('causes.show', compact('cause', 'pledges'));
    }

    /**
     * Create Event
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $user = Auth::user();
        $assets = Asset::whereType('pledge')->get();

        return view('causes.create', compact('user', 'assets'));
    }

    /**
     * Store Cause
     *
     * @param  \App\Http\Requests\Causes\StoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        // Additional validation
        if($warning = $this->guardAgainstInvalidRequests($request))
        {
            return back()->withInput()->with('warning', $warning);
        }

        // Store thumbnail image
        $image_path = Storage::putFile('public/causes', $request->image);
        $image_url = url(Storage::url($image_path));

        // Merge additional data
        $request->merge([
            'image_url' => $image_url,
            'user_id' => $request->user()->id,
        ]);

        // Create the cause
        $cause = Cause::create($request->all());

        return redirect(route('users.causes.index', ['user' => $request->user()->id]))
            ->with('success', 'Cause Created - Approval Pending');
    }

    /**
     * Update Cause
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cause  $cause
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cause $cause)
    {
        $request->validate([
            'decision' => 'required|in:approved_at,rejected_at',
        ]);

        $cause->touchTime($request->decision);

        event(new CauseReviewedEvent($cause));

        return redirect(route('causes.show', ['cause' => $cause->id]));
    }

    /**
     * Destroy Cause
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cause  $cause
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Cause $cause)
    {
        return $cause->delete();
    }

    /**
     * Guard Against Invalid Requests
     * 
     * @param  \App\Http\Requests\Causes\StoreRequest  $request
     * @return mixed
     */
    private function guardAgainstInvalidRequests(StoreRequest $request)
    {
        $target = Asset::find($request->asset_id)->divisible ? toSatoshi($request->target) : $request->target;

        if($target > $asset->issuance)
        {
            return 'You cannot raise more than asset\'s issuance.';
        }

        return false;
    }
}
