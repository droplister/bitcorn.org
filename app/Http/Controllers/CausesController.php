<?php

namespace App\Http\Controllers;

use Storage;
use App\Asset;
use App\Cause;
use Illuminate\Http\Request;
use App\Events\CauseReviewedEvent;
use App\Http\Requests\Causes\StoreRequest;
use App\Http\Requests\Causes\UpdateRequest;

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
        $assets = Asset::whereType('pledge')->get();

        return view('causes.create', compact('assets'));
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

        // Asset
        $asset = Asset::find($request->asset_id);

        // Merge additional data
        $request->merge([
            'image_url' => $image_url,
            'user_id' => $request->user()->id,
            'target' => $asset->divisible ? normalizeQuantity($request->target, true) : $request->target,
        ]);

        // Create the cause
        $cause = Cause::create($request->all());

        return redirect(route('users.causes.index', ['user' => $request->user()->id]))
            ->with('success', 'Success - Cause Created');
    }

    /**
     * Update Cause
     *
     * @param  \App\Http\Requests\Causes\UpdateRequest  $request
     * @param  \App\Cause  $cause
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Cause $cause)
    {
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
        $this->authorize('delete', $cause);

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
        $asset = Asset::find($request->asset_id);

        $target = $asset->divisible ? toSatoshi($request->target) : $request->target;

        if($target > $asset->issuance)
        {
            return 'You cannot raise more than asset\'s issuance.';
        }

        return false;
    }
}
