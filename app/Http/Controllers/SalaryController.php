<?php

namespace App\Http\Controllers;

use App\Http\Requests\SalaryStoreRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
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
    public function create(SalaryStoreRequest $request)
    {
        $file1 = $request->file('paymentFunding');
        $fileName1 = time() . '.' . $file1->getClientOriginalExtension();
        $request->file('paymentFunding')->storeAs('storage', $fileName1);
        $path1 = "/storage/" . $fileName1;
        $file2 = $request->file('terrorismFunding');
        $fileName2 = time() . '.' . $file2->getClientOriginalExtension();
        $request->file('terrorismFunding')->storeAs('storage', $fileName2);
        $path2 = "/storage/" . $fileName2;
        Storage::url($fileName1);
        Storage::url($fileName2);
        // Storage ::disk('local')->put($fileName1,$file1);
        // Storage ::disk('local')->put($fileName2,$file2);
        Salary::create(

            ['national_id' => $request->national_id] +
                ['companyCommercialRegister' => $request->companyCommercialRegister] +
                ['isTaxCompliant' => $request->isTaxCompliant] +
                ['isRecordedAddedValue' => $request->isRecordedAddedValue] +
                ['terrorismFunding' => $path2] +
                ['paymentFunding' => $path1] +
                ['status' => $request->status] + ['user_email' => Auth::user()->email]

        );
        // Storage::putFile('files', $fileName); // path -- file
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
    public function update(SalaryStoreRequest $request, string $id)
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
