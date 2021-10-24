<?php

namespace App\Http\Controllers\Admin\FAQ;

use App\Http\Controllers\Controller;
use App\Models\Admin\FAQ\Faq;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Kamaln7\Toastr\Facades\Toastr;

class FaqController extends Controller
{
    protected $folderName='admin.FAQ.';
    protected $faq;
    function __construct(Faq $faq)
    {
        $this->middleware('auth');
        $this->faq=$faq;
    }
    public function getSlug($toSlug)
    {
        return SlugService::createSlug(Faq::class, 'slug', $toSlug);
    }
    public function getFaqs($n)
    {
        return Faq::orderByDesc('created_at')->paginate($n);
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
            'activePage'=>'faq_list',
            'page'=>'faq',
            'faqs'=>$this->getFaqs(10),
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
            'activePage'=>'faq_create',
            'page'=>'faq',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // return $request;
        $this->faq->fill($request->all());
        $this->faq->slug=$this->getSlug($this->faq->question);
        if(!$request->has('status'))
        {
            $this->faq->status=false;
        }
        if($this->faq->save()){
            Toastr::success('Successfully 1 FAQ has added', 'Success !!!!', ['positionClass'=>'toast-bottom-right']);
            return redirect()->route('faq.index')->with('success', 'Successfully 1 FAQ has added');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\FAQ\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function show(Faq $faq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\FAQ\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function edit(Faq $faq)
    {
        //
        return view($this->folderName.'form', [
            'activePage'=>'faq_list',
            'page'=>'faq',
            'faq'=>$faq,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\FAQ\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Faq $faq)
    {
        //
        $this->faq=$faq;
        $this->faq->fill($request->all());
        $this->faq->slug=$this->getSlug($this->faq->question);
        if(!$request->has('status'))
        {
            $this->faq->status=false;
        }
        if($this->faq->save()){
            Toastr::success('Successfully 1 FAQ has Updated', 'Success !!!!', ['positionClass'=>'toast-bottom-right']);
            return redirect()->route('faq.index')->with('success', 'Successfully 1 FAQ has Updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\FAQ\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faq $faq)
    {
        //
        if($faq->delete()){
            Toastr::success('Successfully 1 FAQ has deleted', 'Success !!!!', ['positionClass'=>'toast-bottom-right']);
            return redirect()->route('faq.index')->with('success', 'Successfully 1 FAQ has deleted');
        }
    }
}
