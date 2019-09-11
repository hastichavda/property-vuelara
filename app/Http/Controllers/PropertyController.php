<?php

namespace App\Http\Controllers;

use App\Property;
use App\Type;

use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $properties = Property::with('types')->get();
      return view('admin.displayProperty',compact('properties'));   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $property = Property::with('types')->get();
      return view('admin.createProperty',compact('property'));   
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
        'title'=>'required',
        'description'=>'required',
        'image'=>'required',
        'price'=>'required'
      ]);
      $property= new Property;

      $imageName = time() . '.' . $request->image->getClientOriginalExtension();
      $request->image->move(public_path('/uploads/'), $imageName);
      $imagePath = '/uploads/'. $imageName;
      $property->image = $imagePath;

      // $imagePath = '';
      // if ($request->has('image')) {
      //   $image = $request->file('image');
      //   $name = rand(00000,99999).'-'.$image->getClientOriginalName();
      //   $destinationPath = public_path('').'uploads/property'.$name ;      
      //   $imagePath = $destinationPath . "/" .  $name;
      //   $image->move($destinationPath, $name);
      //   $property->image = $imagePath;
      // }
      $property->title = $request->title;
      $property->description = $request->description;
      $property->price = $request->price;
      
      // if($properties->action == 1){
      //     $properties->action = 0;
      // } else {
      //     $properties->action = 1;
      // }
      $property->action = $request->action;
      $property->save();
      $property->types()->attach(json_decode($request->types));
      $property->types;
      return response()->json([
        'property' => $property
      ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function show(Property $property)
    {
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    
      $properties = Property::with('types')->findOrFail($id);
      return view('admin.edit', compact('properties'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
      $properties = Property::with('types')->findOrFail($id);

      $imageName = time() . '.' . $request->image->getClientOriginalExtension();
      $request->image->move(public_path('uploads/'), $imageName);
      $imagePath = 'uploads/'. $imageName;
      $properties->image = $imagePath;
    
      $properties->title = $request->title;
      $properties->description = $request->description;
      $properties->price = $request->price;
      $properties->action = $request->action;
      $properties->save();
      $properties->types()->sync($request->types);
      return response()->json([
          'properties' => $properties,
      ]); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function destroy(Property $property)
    {
      $property->delete();
      return response()->json([
          'status' => 'Deleted'
      ]);
    }
}
