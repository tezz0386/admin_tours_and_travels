<?php

namespace App\Http\Controllers\Admin\Activity;

use App\Http\Controllers\Controller;
use App\Http\Requests\ActivityRequest;
use App\Http\Requests\ActivityUpdateRequest;
use App\Models\Admin\Activity\Activity;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Kamaln7\Toastr\Facades\Toastr;
use Auth;

class ActivityController extends Controller
{
    protected $folderName ='admin.activity.';
    function __construct(Activity $activity)
    {
        $this->middleware('auth');
        $this->activity=$activity;
    }
    public function getSlug($toSlug)
    {
        return SlugService::createSlug(Activity::class, 'slug', $toSlug);
    }
    public function getActivities($n='')
    {
        $activities ='';
        if($n=='')
        {
           $activities= Activity::orderByDesc('created_at')->paginate($n);
        }else{
            $activities= Activity::orderByDesc('created_at')->paginate($n);
        }
        return $activities;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view($this->folderName.'index', [
            'activities'=>$this->getActivities(10),
            'activePage'=>'activity_list',
            'page'=>'activity',
            'n'=>1,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view($this->folderName.'form', [
            'page'=>'activity',
            'activePage'=>'activity_create',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ActivityRequest $request)
    {
        //
        $this->activity->fill($request->all());
        $this->activity->created_by = Auth::user()->id;
        $this->activity->slug = $this->getSlug($this->activity->name);
        if($this->activity->save()){
            Toastr::success('Successfully 1 Activity has addded', 'Success !!!', ["positionClass" => "toast-bottom-right"]);
            return redirect()->route('activity.index')->with('success', 'Successfully 1 Activity has addded');
        }else{
            return back()->withInput()->with('error', 'Could not be added please try again later');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Activity\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function show(Activity $activity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Activity\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function edit(Activity $activity)
    {
        //
        return view($this->folderName.'form', [
            'activity'=>$activity,
            'activePage'=>'activity_create',
            'page'=>'activity',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Activity\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function update(ActivityUpdateRequest $request, Activity $activity)
    {
        //
        $this->activity=$activity;
        $this->activity->fill($request->all());
        $this->activity->created_by = Auth::user()->id;
        $this->activity->slug = $this->getSlug($this->activity->name);
        if($this->activity->save()){
            Toastr::success('Successfully 1 Activity has updated', 'Success !!!', ["positionClass" => "toast-bottom-right"]);
            return redirect()->route('activity.index')->with('success', 'Successfully 1 Activity has updated');
        }else{
            return back()->withInput()->with('error', 'Could not be added please try again later');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Activity\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activity $activity)
    {
        //
        if($activity->delete()){
            Toastr::success('Successfully 1 Activity has deleted', 'Success !!!', ["positionClass" => "toast-bottom-right"]);
            return redirect()->route('activity.index')->with('success', 'Successfully 1 Activity has deleted');
        }else{
            return back()->with('error', 'Could not be deleted please try again later');
        }
    }
}
