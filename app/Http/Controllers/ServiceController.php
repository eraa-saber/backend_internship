<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Http\Requests\ServiceStoreRequest;
class ServiceController extends Controller
{
 public function index(){
    $services=Service::all();
    //return Json Response
    return response()->json([
        'results'=>$services
    ],200);
 }   
 public function show($id){
    $services=Service::find($id);
    if(!$services){
        return response()->json([
            'message'=>'ServiceNotFound.'
        ],200);
    }
    return response()->json([
        'results'=>$services
    ],200);
 }
 
 public function store(ServiceStoreRequest $request){
    try{
        Service::create([
             'name'=>$request->name,
             'description'=>$request->description,
             'status'=>$request->status
        ]);
        return response()->json([
            'message'=>'Service Successfully created.'
        ],200);

    }catch(\Exception $e){
        return response()->json([
            'message'=>'Something went wrong.'
        ],200);
    }
 }
}
