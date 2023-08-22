<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserStoreRequest;
use App\Models\Salary;

class SalaryController extends Controller
{
    public function index()
    {
        $salary = Salary::all();

        return response()->json([
            'results' => $salary
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(UserStoreRequest $request)
    {
        [
            'id' => $request->id,

            'companyCommercialRegister' => $request->companyCommercialRegister,
            'isRecordedAddedValue' => $request->isRecordedAddedValue,
            'isTaxCompliant' => $request->isTaxCompliant,
            'terrorismFunding' => $request->terrorismFunding,
            'paymentFunding' => $request->paymentFunding,
            'user_email' => $request->user_email,
            'status' => $request->status,
        ];
    }



    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $salary = Salary::find($id);


        if (!$salary) {
            return response()->json([
                'message' => "Salary not found"
            ], 404);
        }
        return response()->json([
            'results' => $salary
        ], 200);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UserStoreRequest $request, string $id)
    {
        try {
            //find Salary
            $salary = Salary::find($id);

            if (!$salary) {
                return $salary()->json([
                    'message' => "Salary not found"
                ], 404);
            }

            //Invert status
            $salary->status = !$request->status;
            $salary->save();

            return response()->json([
                'message' => "Successfully updated."
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => "ERROR!!!"
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //delete user
        $salary = Salary::find($id);

        if (!$salary) {
            return response()->json([
                'message' => "Salary not found"
            ], 404);
        }

        $salary->delete();

        return response()->json([
            'message' => "Successfully deleted."
        ], 200);
    }
}
