<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceStoreRequest;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        //return Json Response
        return response()->json([
            'results' => $services
        ], 200);
    }
    public function show($id)
    {
        $services = Service::find($id);
        if (!$services) {
            return response()->json([
                'message' => 'Service not found.'
            ], 404);
        }
        return response()->json([
            'results' => $services
        ], 200);
    }
    public function update(ServiceStoreRequest $request, $id)
    {
        try {
            $service = Service::find($id);
            if (!$service) {
                return $service()->json([
                    'message' => "Service not found"
                ], 404);
            }
            $service->name = $request->name;
            $service->description = $request->description;
            $service->status = $request->status;
            $service->save();

            return response()->json([
                'message' => "Successfully updated."
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => "Something went wrong!"
            ], 500);
        }
  
    }

    public function create()
    {
        //
    }

    public function store(ServiceStoreRequest $request)
    {
        try {
            Service::create([
                'name' => $request->name,
                'description' => $request->description,
                'status' => $request->status
            ]);
            return response()->json([
                'message' => "Service successfully created."
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => "Something went wrong!."
            ], 500);
        }
    }
    public function destroy(string $id)
    {
        // Find id 
        $service = Service::find($id);
        if (!$service) {
            return response()->json([
                'message' => 'Service not found.'
            ], 404);
        }

        // Delete Service
        $service->delete();

        // Return Json Response
        return response()->json([
            'message' => "Service successfully deleted."
        ], 200);
    }
}
