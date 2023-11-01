<?php

namespace App\Http\Controllers;

use App\Helpers\FileHelpers;
use App\Models\Financial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class  FinancialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $financials = Financial::whereNull('quarter')
            ->orderBy('id', 'desc')
            ->paginate(5);

        return view('financials.list', compact('financials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function addYear()
    {
        return view('financials.addYear');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeYear(Request $request)
    {
        $request->validate([
            'year' => ['required'],
            'filepath' => ['nullable', 'mimes:pdf,doc'] // Adjust allowed file types as needed
        ]);

        $financials = new Financial();
        $financials->year = $request->year;
        if ($request->hasFile('filepath')) {
            $dir = FileHelpers::fileUpdate('reports', $request); // Call the fileUpdate method
            $financials->filepath = $request->file('filepath')->storeAs($dir);
        } else {
            // File is not uploaded, set filepath to null
            $financials->filepath = null;
        }
        $financials->save();
        return redirect()->route('financials.list')->with('success', 'Financial Year added successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editYear(string $id)
    {
        $financial = Financial::findOrFail($id);
        return view('financials.editYear', compact('financial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateYear($id, Request $request)
    {
        $financial = Financial::findOrFail($id);
        $request->validate([
            'year' => ['required'],
            'filepath' => ['nullable', 'mimes:pdf,doc'] // Adjust allowed file types as needed
        ]);

        $oldYear = $financial->year; // Store the old year value

        // Update the financial record with the new values
        $financial->year = $request->year;
        $financial->quarter = $request->quarter;
        $oldFileName = $financial->filepath;

        // Check if a new file is uploaded and update it if necessary
        if ($request->hasFile('filepath')) {
            // Use the fileUpdate helper function to determine the folder and get the file path
            $dir = FileHelpers::fileUpdate('reports', $request);

            // Store the new file and get its path
            $newFileName = $request->file('filepath')->storeAs($dir);
            if ($oldFileName) {
                Storage::move($newFileName, $oldFileName);
                $financial->filepath = $oldFileName;
            } else {
                $financial->filepath = $newFileName;
            }
        }
        // Check if the year has changed before updating the database
        if ($financial->isDirty('year')) {
            // Perform the update only if 'year' has changed
            Financial::where('year', $oldYear)
                ->update(['year' => $request->year]);
        }

         $financial->update();
        return redirect()->route('financials.list')->with('success', 'Financial Year updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find the year to be deleted
        $year = Financial::findOrFail($id);

        // Get the ID of the year's related quarters
        $quarterIds = Financial::where('year', $year->year)->pluck('id')->toArray();

        // Iterate through the quarters, retrieve file paths, and delete files
        foreach ($quarterIds as $quarterId) {
            $quarter = Financial::findOrFail($quarterId);
            $filePath = $quarter->filepath;

            // Delete the associated file if it exists
            if ($filePath && Storage::exists($filePath)) {
                Storage::delete($filePath);
            }
        }

        // Delete the year and its related quarters
        Financial::where('year', $year->year)->delete();

        return redirect()->route('financials.list')->with('success', 'Year and related quarters and files deleted successfully');
    }

    
    /**
     * Show the form for creating a new resource.
     */
    public function addQuarter($year, $quarter)
    {
        $financials = Financial::where('year', $year)
            ->where('quarter', 'Q1')
            ->get();

        return view('financials.addQuarter', compact('financials', 'year', 'quarter'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeQuarter($year, $quarter, Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:100'],
            'filepath' => ['nullable', 'mimes:pdf,doc'] // Adjust allowed file types as needed
        ]);

        $financial = new Financial();
        $financial->year = $year;
        $financial->quarter = $quarter;
        $financial->title = $request->title;
        if ($request->hasFile('filepath')) {
            // Get the directory path from the FileHelper
            $dir = FileHelpers::fileUpdate('reports', $request);

            // Store the image only if a file is provided
            $financial->filepath = $request->file('filepath')->storeAs($dir);
        } else {
            // Handle the case when 'filepath' is empty or not provided
            $financial->filepath = '';
        }

        $financial->save();
        return redirect("financials/list")->with('success', 'Quarter added successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editQuarter($year, $quarter, $id)
    {
        // Retrieve the financial record based on the 'id'
        $financial = Financial::findOrFail($id);

        // Assuming you need them in the view, you can pass them to the view as data
        return view('financials.editQuarter', compact('financial', 'year', 'quarter'));
    }

    public function updateQuarter($year, $quarter, $id, Request $request)
    {
        $financial = Financial::findOrFail($id);
        $request->validate([
            'title' => ['required'],
            'filepath' => ['nullable', 'mimes:pdf,doc'] // Adjust allowed file types as needed
        ]);

        // Update the financial record with the new values
        $financial->title = $request->title;
        $financial->year = $year;
        $financial->quarter = $quarter;
        $oldFileName = $financial->filepath;

        // Check if a new file is uploaded and update it if necessary
        if ($request->hasFile('filepath')) {
            // Get the directory path from the FileHelper
            $dir = FileHelpers::fileUpdate('reports', $request);

            //store image
            $newFileName = $request->file('filepath')->storeAs($dir);
            if ($oldFileName) {
                Storage::move($newFileName, $oldFileName);
                $financial->filepath = $oldFileName;
                } else {
                    $financial->filepath = $newFileName;
                }
        }
        $financial->update();
        return redirect()->route('financials.list')->with('success', 'Financial Document updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyQuarter($year, $quarter, $id)
    {
        // Find the financial record by its ID
        $financial = Financial::findOrFail($id);

        // Verify that the 'year' and 'quarter' in the URL match the record
        if ($financial->year == $year && $financial->quarter == $quarter) {
            // Get the file path from the financial record
            $filePath = $financial->filepath;

            // Delete the associated file if it exists
            if ($filePath && Storage::exists($filePath)) {
                Storage::delete($filePath);
            }

            // Perform the deletion of the financial record
            $financial->delete();

            // Redirect to a success page or a different route as needed
            return redirect()->route('financials.list')->with('success', 'Quarter deleted successfully');
        } else {
            // Handle the case where the 'year' and 'quarter' in the URL do not match the record
            return redirect()->route('financials.list')->with('error', 'Invalid quarter information');
        }
    }

}
