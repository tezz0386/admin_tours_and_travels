<?php

namespace App\Http\Controllers\Admin\Banner;

use App\Http\Controllers\Controller;
use App\Http\Requests\BannerRequest;
use App\Models\Admin\Banner\Banner;
use App\Support\ImageSupport;
use Auth;
use Illuminate\Http\Request;
use Kamaln7\Toastr\Facades\Toastr;

class BannerController extends Controller
{
    protected $folderName='admin.banner.';
    protected $imageSupport;
    protected $imageWidht=1920;
    protected $imageHeight=810;
    protected $banner;
    function __construct(ImageSupport $imageSupport, Banner $banner)
    {
        $this->middleware('auth');
        $this->imageSupport = $imageSupport;
        $this->banner = $banner;
    }
    public function getBanners()
    {
        return Banner::orderByDesc('created_at')->get();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view($this->folderName.'form',[
            'activePage'=>'setting',
            'banners'=>$this->getBanners(),
            'n'=>1,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BannerRequest $request)
    {
        //
        $this->banner->fill($request->all());
        $image = $this->imageSupport->saveAnyImg($request, 'banners', 'image', $this->imageWidht, $this->imageHeight);
        $this->banner->image = $image;
        $this->banner->created_by = Auth::user()->id;
        if($this->banner->save()){
            Toastr::success('Successfully 1 banner has created', 'Success !!!', ['positionClass'=>'toast-bottom-right']);
            return redirect()->route('banner.index')->with('success', 'Successfully 1 banner has created');
        }else{
            return back()->withInput()->with('error', 'Could not be banner created please try again later');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Banner\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        //
         return view($this->folderName.'show',[
            'activePage'=>'setting',
            'banner'=>$banner,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Banner\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        //
        return view($this->folderName.'form',[
            'activePage'=>'site_setting',
            'banners'=>$this->getBanners(),
            'banner'=>$banner,
            'n'=>1,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Banner\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banner $banner)
    {
        //
        $this->banner = $banner;
        $this->banner->fill($request->all());
        $this->banner->created_by = Auth::user()->id;
        if(!$request->file('image') == ''){
            $this->imageSupport->deleteImg('banner', $this->banner->image);
            $image = $this->imageSupport->saveAnyImg($request, 'banners', 'image', $this->imageWidht, $this->imageHeight);
            $this->banner->image=$image;
        }
        if($this->banner->save()){
            Toastr::success('Successfully 1 banner has updated', 'Success !!!', ['positionClass'=>'toast-bottom-right']);
            return redirect()->route('banner.index')->with('success', 'Successfully 1 banner has updated');
        }else{
            return back()->withInput()->with('error', 'Could not be banner updated please try again later');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Banner\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        //
        if($banner->delete()){
            Toastr::success('Successfully 1 banner has deleted', 'Success !!!', ['positionClass'=>'toast-bottom-right']);
            return redirect()->route('banner.index')->with('success', 'Successfully 1 banner has deleted');
        }else{
            return back()->with('error', 'Could not be deleted please try again later');
        }
    }
}
