<?php

namespace App\Http\Controllers\Admin\Destination;

use App\Http\Controllers\Controller;
use App\Http\Requests\DestinationRequest;
use App\Http\Requests\DestinationUpdateRequest;
use App\Models\Admin\Destination\Destination;
use App\Support\ImageSupport;
use App\Support\Slug;
use Auth;
use Illuminate\Http\Request;
use Kamaln7\Toastr\Facades\Toastr;

class DestinationController extends Controller
{
    protected $folderName='admin.destination.';
    protected $destination;
    protected $ImageSupport;
    protected $imageHeight=450;
    protected $imageWidth=750;
    function __construct(ImageSupport $ImageSupport, Destination $destination)
    {
        $this->middleware('auth');
        $this->destination= $destination;
        $this->ImageSupport = $ImageSupport;
    }
    public function getDestinations($n)
    {
        return Destination::orderByDesc('created_at')->paginate(10);
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
            'destinations'=>$this->getDestinations(10),
            'n'=>1,
            'page'=>'destination',
            'activePage'=>'destination_list',
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
            'page'=>'destination',
            'activePage'=>'destination_create',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DestinationRequest $request)
    {
        //
        $this->destination->fill($request->all());
        $this->destination->category_id = $request->category_name;
        if(!$request->file('image') == ''){
            $image = $this->ImageSupport->saveAnyImg($request, 'destination', 'image', $this->imageWidth, $this->imageHeight);
             $this->destination->image = $image;
        }
        $this->destination->created_by=Auth::user()->id;
        $this->destination->slug = Slug::getSlug($this->destination->name);
        if($this->destination->save()){
            Toastr::success('Successfully 1 destination has addded', 'Success !!!', ["positionClass" => "toast-bottom-right"]);
            return redirect()->route('destination.index')->with('success', 'Successfully 1 destination destination has addded');
        }else{
            return back()->withInput()->with('error', 'Could not be destination added please try again later');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Destination\Destination  $destination
     * @return \Illuminate\Http\Response
     */
    public function show(Destination $destination)
    {
        //
        // return $destination;
        return view($this->folderName.'show', [
            'destination'=>$destination,
            'page'=>'destination',
            'activePage'=>'destination_list',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Destination\Destination  $destination
     * @return \Illuminate\Http\Response
     */
    public function edit(Destination $destination)
    {
        //
        // return $destination;
        return view($this->folderName.'form', [
            'destination'=>$destination,
            'page'=>'destination',
            'activePage'=>'destination_create',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Destination\Destination  $destination
     * @return \Illuminate\Http\Response
     */
    public function update(DestinationUpdateRequest $request, Destination $destination)
    {
        //
        $this->destination->category_id = $request->category_name;
        $this->destination = $destination;
        $this->destination->fill($request->all());
        $this->destination->category_id = $request->category_name;
        if(!$request->file('image') == ''){
            $this->ImageSupport->deleteImg('destination', $this->destination->image);
            $image = $this->ImageSupport->saveAnyImg($request, 'destination', 'image', $this->imageWidth, $this->imageHeight);
            $this->destination->image = $image;
        }
        $this->destination->created_by=Auth::user()->id;
        $this->destination->slug = Slug::getSlug($this->destination->name);
        if($this->destination->save()){
            Toastr::success('Successfully 1 destination  has updated', 'Success !!!', ["positionClass" => "toast-bottom-right"]);
            return redirect()->route('destination.index')->with('success', 'Successfully 1 destination  has updated');
        }else{
            return back()->withInput()->with('error', 'Could not be destination destination updated please try again later');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Destination\Destination  $destination
     * @return \Illuminate\Http\Response
     */
    public function destroy(Destination $destination)
    {
        //
         if($destination->delete()){
            Toastr::success('Successfully 1 destination  has deleted you can restore again from trash list', 'Success !!!', ["positionClass" => "toast-bottom-right"]);
            return redirect()->route('destination.index')->with('success', 'Successfully 1 destination has deleted you can restore again from trash list');
        }else{
            return back()->with('error', 'Could not be deleted please try again later');
        }
    }
}
