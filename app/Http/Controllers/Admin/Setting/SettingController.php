<?php

namespace App\Http\Controllers\Admin\Setting;


use App\Http\Controllers\Controller;
use App\Http\Requests\SettingRequest;
use App\Http\Requests\SettingUpdateRequest;
use App\Models\Admin\Setting\Setting;
use App\Support\ImageSupport;
use Auth;
use Illuminate\Http\Request;
use Kamaln7\Toastr\Facades\Toastr;

class SettingController extends Controller
{
    protected $folderName = 'admin.setting.';
    protected $imageSupport;
    protected $setting;
    protected $iconHeight=80;
    protected $iconWidth=80;
    protected $logoHeight=150;
    protected $logoWidth=150;
    function __construct(ImageSupport $imageSuport, Setting $setting)
    {
        $this->middleware('auth');
        $this->imageSuport = $imageSuport;
        $this->setting = $setting;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $setting = Setting::find(1);
        if(!$setting){
            return view($this->folderName.'form', [
                'activePage'=>'setting',
                'title'=>'setting'
            ]);
        }else{
            return view($this->folderName.'form', [
                'activePage'=>'setting',
                'setting'=>$setting,
                'title'=>'setting'
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $this->setting = Setting::find(1);
        if($this->setting){
            return redirect()->route('setting.index');
        }
        return view($this->folderName.'form', [
            'activePage'=>'setting',
            'title'=>'setting'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SettingRequest $request)
    {
        //
        $this->setting->fill($request->all());
        $logo = $this->imageSuport->saveAnyImg($request, 'setting', 'logo', $this->logoWidth, $this->logoHeight);
        $icon = $this->imageSuport->saveAnyImg($request, 'setting', 'icon', $this->iconWidth, $this->iconHeight);
        $this->setting->icon = $icon;
        $this->setting->logo = $logo;
        $this->setting->updated_by = Auth::user()->id;
        if($this->setting->save()){
            Toastr::success('Successfully Setting Has Created', 'Success !!!', ["positionClass" => "toast-bottom-right"]);
            return redirect()->route('setting.index')->with('success', 'Successfully Setting Has Created');
        }else{
            return back()->withInput()->with('error', 'Could not be save please try again later');
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Setting\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        //
        return view($this->folderName.'form', [
            'setting'=>$setting,
            'activePage'=>'setting',
            'title'=>'setting'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Setting\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(SettingUpdateRequest $request, Setting $setting)
    {
        //
        $this->setting = $setting;
        $this->setting->fill($request->all());
        if(!$request->file('logo')== ''){
            $this->imageSuport->deleteImg('setting', $this->setting->logo);
            $logo = $this->imageSuport->saveAnyImg($request, 'setting', 'logo', $this->logoWidth, $this->logoHeight);
            $this->setting->logo = $logo;
        }
        if(!$request->file('icon') == ''){
            $this->imageSuport->deleteImg('setting', $this->setting->icon);
            $icon = $this->imageSuport->saveAnyImg($request, 'setting', 'icon', $this->iconWidth, $this->iconheight);
            $this->setting->icon = $icon;
        }
        $this->setting->updated_by = Auth::user()->id;
        if($this->setting->save()){
            Toastr::success('Successfully Setting Has Updated', 'Success !!!', ["positionClass" => "toast-bottom-right"]);
            return redirect()->route('setting.index')->with('success', 'Successfully Setting Has Updated');
        }else{
            return back()->withInput()->with('error', 'Could not be update please try again later');
        }

    }
}
