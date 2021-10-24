<?php

namespace App\Http\Controllers\Admin\Member;

use App\Http\Controllers\Controller;
use App\Http\Requests\MemberRequest;
use App\Models\Admin\Member\Member;
use App\Support\ImageSupport;
use Auth;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Kamaln7\Toastr\Facades\Toastr;

class MemberController extends Controller
{
    protected $imageSupport;
    protected $member;
    protected $imageWidth=600;
    protected $imageHeight=600;
    protected $folderName='admin.member.';
    function __construct(ImageSupport $imageSupport, Member $member)
    {
        $this->middleware('auth');
        $this->imageSupport=$imageSupport;
        $this->member = $member;
    }
    public function getMembers($n)
    {
        return Member::orderByDesc('created_at')->paginate($n);
    }
    public function getSlug($toSlug)
    {
        return SlugService::createSlug(Member::class, 'slug', $toSlug);
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
            'page'=>'member',
            'activePage'=>'member_list',
            'members'=>$this->getMembers(10),
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
        return view($this->folderName.'form',[
            'page'=>'member',
            'activePage'=>'member_create',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MemberRequest $request)
    {
        //
        $this->member->fill($request->all());
        $this->member->created_by =Auth::user()->id;
        $image = $this->imageSupport->saveAnyImg($request, 'member', 'image', $this->imageWidth, $this->imageHeight);
        $this->member->image = $image;
        $this->member->slug = $this->getSlug($this->member->name);
        if($this->member->save()){
            Toastr::success('Successfully 1 Member has added', 'Success !!!!', ['positionClass'=>'toast-bottom-right']);
            return redirect()->route('member.index')->with('success', 'Successfully 1 Member has added');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Member\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Member\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        //
        return view($this->folderName.'form', [
            'page'=>'member',
            'activePage'=>'member_create',
            'member'=>$member,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Member\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        //
        $this->member=$member;
        $this->member->fill($request->all());
        $this->member->created_by =Auth::user()->id;
        if(!$request->file('image')==''){
            $this->imageSupport->deleteImg('member', $this->member->image);
            $image = $this->imageSupport->saveAnyImg($request, 'member', 'image', $this->imageWidth, $this->imageHeight);
            $this->member->image = $image;  
        }
        $this->member->slug = $this->getSlug($this->member->name);
        if($this->member->save()){
            Toastr::success('Successfully 1 Member has added', 'Success !!!!', ['positionClass'=>'toast-bottom-right']);
            return redirect()->route('member.index')->with('success', 'Successfully 1 Member has added');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Member\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        //
        if($member->delete()){
            Toastr::success('Successfully 1 Member has deleted', 'Success !!!', ['positionClass'=>'toast-bottom-right']);
            return redirect()->route('member.index')->with('success', 'Successfully 1 Member has deleted');
        }else{
            return back()->with('error', 'Could not be deleted please try again later');
        }
    }
}
