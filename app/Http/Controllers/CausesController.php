<?php

namespace App\Http\Controllers;

use App\Asset;
use App\Cause;
use Carbon\Carbon;
use Auth, Cache, Storage;
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
    }

    /**
     * Causes Index
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Active Causes
        $active_causes = Cache::remember('active_causes', 60,
            function () {
                return Cause::popular()->get();
            }
        );

        // Ended Causes
        $ended_causes = Cache::remember('ended_causes', 60,
            function () {
                return Cause::ended()->get();
            }
        );

        return view('causes.index', compact('active_causes', 'ended_causes'));
    }

    /**
     * Show Cause
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  integer  $cause
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $cause)
    {
        $cause = Cause::findOrFail($cause);

        $this->authorize('view', $cause);

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
     * Store Event
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Cause::class);

        $request->validate([
            'title' => 'required|max:255',
            'subtitle' => 'required|max:255',
            'content' => 'required|max:5000',
            'address' => 'required|min:26|max:34',
            'memo' => 'required|unique:causes|min:4|max:12',
            'target' => 'required|min:10|integer',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|dimensions:width=370,height=240',
            'asset_id' => 'required|exists:assets,id',
            'ended_at' => 'required|date|after:yesterday',
            'terms' => 'required',
        ]);

        $asset = Asset::find($request->asset_id);

        if($asset->divisible)
        {
            $target = $request->target * 100000000;
        }
        else
        {
            $target = $request->target;
        }

        if($target > $asset->issuance)
        {
            return back()->withInput()->with('warning', 'You cannot raise more than asset\'s supply.');
        }

        if($request->ended_at > Carbon::now()->addDays(45))
        {
            return back()->withInput()->with('warning', 'You cannot run a campaign longer than 45 days.');
        }

        $image_path = Storage::putFile('public/causes', $request->image);
        $image_url = Storage::url($image_path);

        $cause = Cause::create([
            'user_id' => Auth::user()->id,
            'asset_id' => $request->asset_id,
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'content' => $request->content,
            'address' => $request->address,
            'memo' => $request->memo,
            'target' => $request->target,
            'content' => strip_tags($request->content),
            'image_url' => url($image_url),
            'ended_at' => $request->ended_at,
        ]);

        return redirect(route('users.causes.index', ['user' => Auth::user()->id]))
            ->with('success', 'Cause Created');
    }

    /**
     * Destroy Cause
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  integer  $cause
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $cause)
    {
        $this->authorize('delete', $cause);

        $cause = Cause::findOrFail($cause);
        $cause->delete();

        return 'OK';
    }
}
