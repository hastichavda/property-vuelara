<?php

namespace App\Http\Controllers;

use App\Inquery;
use App\Property;
use Auth;
use Illuminate\Http\Request;

class InqueryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inqueries = Inquery::with('properties')->get();
        return view('property.connectNow',compact('inqueries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'fname'=>'required',
            'lname'=>'required',
            'email'=>'required',
            'contactno'=>'required',
            'message' => 'required'
        ]);

        $inquery = new Inquery;
        $inquery->fname = $request->fname;
        $inquery->lname = $request->lname;
        $inquery->email = $request->email;
        $inquery->contactno = $request->contactno;
        $inquery->message = $request->message;
        $inquery->user_id = Auth::user()->id;
        $inquery->save();
        $inquery->properties()->sync($request->properties);
        $inquery->properties;
        return response()->json([
            'inquery' => $inquery
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\inquery  $inquery
     * @return \Illuminate\Http\Response
     */
    public function show(inquery $inquery)
    {
        $inqueries = Inquery::all();
        return view('admin.inqueryForm' , compact('inqueries'));  
    }

    /**
     * Show the form for editing
     *  the specified resource.
     *
     * @param  \App\inquery  $inquery
     * @return \Illuminate\Http\Response
     */
    public function edit(inquery $inquery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\inquery  $inquery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, inquery $inquery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\inquery  $inquery
     * @return \Illuminate\Http\Response
     */
    public function destroy(inquery $inquery)
    {
        // $inquery->delete();
        // return response()->json([
        //     'status' => 'Deleted'
        // ]);
    }
    public function display()
    {
        $inqueries = Inquery::all();
        return view('admin.inqueryForm' , compact('inqueries'));
    }
    public function inquerydelete(Request $id)
    {
        $inquery->delete()->find($id);
        return response()->json([
            'status' => 'Deleted'
        ]);
    }
}
