<?php

namespace App\Http\Controllers\Admin\Charge;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChargeRequest;
use App\Http\Requests\ChargeUpdateRequest;
use App\Models\Admin\Charge\Charge;
use Auth;
use Illuminate\Http\Request;
use Kamaln7\Toastr\Facades\Toastr;

class ChargeController extends Controller
{
    protected $folderName = 'admin.charge.';
    protected $charge;
    function __construct(Charge $charge)
    {
        $this->middleware('auth');
        $this->charge = $charge;
    }
    public function getCharges()
    {
        return Charge::orderByDesc('created_at')->get();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view($this->folderName.'form', [
            'activePage'=>'charge',
            'charges'=>$this->getCharges(),
            'n'=>1,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ChargeRequest $request)
    {
        //
        $this->charge->fill($request->all());
        $this->charge->created_by = Auth::user()->id;
        if($this->charge->save()){
            Toastr::success('Successfully 1 charge has added', 'Success !!', ['positionClass'=>'toast-bottom-right']);
            return redirect()->route('charge.index')->with('success', 'Successfully 1 charge has added');
        }else{
            return back()->withInput()->with('error', 'Could not be added please try again later');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Charge\Charge  $charge
     * @return \Illuminate\Http\Response
     */
    public function edit(Charge $charge)
    {
        //
          return view($this->folderName.'form', [
            'activePage'=>'charge',
            'charges'=>$this->getCharges(),
            'charge'=>$charge,
            'n'=>1,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Charge\Charge  $charge
     * @return \Illuminate\Http\Response
     */
    public function update(ChargeUpdateRequest $request, Charge $charge)
    {
        //
        $this->charge = $charge;
        $this->charge->fill($request->all());
        $this->charge->created_by = Auth::user()->id;
        if($this->charge->save()){
            Toastr::success('Successfully 1 charge has Updated', 'Success !!', ['positionClass'=>'toast-bottom-right']);
            return redirect()->route('charge.index')->with('success', 'Successfully 1 charge has Updated');
        }else{
            return back()->withInput()->with('error', 'Could not be Updated please try again later');
        }
    }
}
