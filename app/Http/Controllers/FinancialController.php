<?php

namespace App\Http\Controllers;

use App\Models\Financial;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
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
    // public function storeYear(Request $request)
    // {
    //     $request->validate([
    //         'year' => ['required'],
    //         'filepath' => ['nullable', 'mimes:pdf,doc'] // Adjust allowed file types as needed
    //     ]);
    //     $financials = new Financial();
    //     if ($request->hasFile('filepath')) {
    //         $file = $request->file('filepath');
    //         $originalName = $file->getClientOriginalName();
    //         $extension = $file->getClientOriginalExtension();
    //         $words = explode(' ', pathinfo($originalName, PATHINFO_FILENAME));
    //         $uniqueWords = array_unique($words);
    //         $cleanFileName = implode(' ', $uniqueWords);
    //         $file_name = Str::slug($cleanFileName) . '-' . time() . '.' . $extension;
    //         $dir = "uploads/reports/";

    //         $financials = new Financial();
    //         $financials->filepath = $request->file('filepath')->storeAs($dir, $file_name);
    //     } else {
    //         $financials->filepath = null;
    //     }
    //     $financials->year = $request->year;
    //     $financials->save();
    //     return redirect()->route('financials.list')->with('success', 'Financial Year added successfully');
    // }
    public function storeYear(Request $request)
    {
        $request->validate([
            'year' => ['required'],
            'filepath' => ['nullable', 'mimes:pdf,doc']
        ]);

        $financial = new Financial();
        $this->processFileUpload($request, $financial);
        $financial->year = $request->year;
        $financial->save();

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
    // public function updateYear($id, Request $request)
    // {
    //     $financial = Financial::findOrFail($id);
    //     $request->validate([
    //         'year' => ['required'],
    //         'filepath' => ['nullable', 'mimes:pdf,doc'] // Adjust allowed file types as needed
    //     ]);

    //     $oldYear = $financial->year; // Store the old year value

    //     // Update the financial record with the new values
    //     $financial->year = $request->year;
    //     $financial->quarter = $request->quarter;
    //     $oldFileName = $financial->filepath;

    //     // Check if a new file is uploaded and update it if necessary
    //     if ($request->hasFile('filepath')) {
    //         $originalName = $request->file('filepath')->getClientOriginalName();
    //         $extension = $request->file('filepath')->getClientOriginalExtension();
    //         $words = explode(' ', pathinfo($originalName, PATHINFO_FILENAME));
    //         $uniqueWords = array_unique($words);
    //         $cleanFileName = implode(' ', $uniqueWords);
    //         $file_name = Str::slug($cleanFileName) . '-' . time() . '.' . $extension;
    //         $dir = "uploads/reports/";
    //         // Store the new file and get its path
    //         $newFileName = $request->file('filepath')->storeAs($dir, $file_name);
    //         if ($oldFileName) {
    //             Storage::move($newFileName, $oldFileName);
    //             $financial->filepath = $oldFileName;
    //         } else {
    //             $financial->filepath = $newFileName;
    //         }
    //     }
    //     // Check if the year has changed before updating the database
    //     if ($financial->isDirty('year')) {
    //         // Perform the update only if 'year' has changed
    //         Financial::where('year', $oldYear)
    //             ->update(['year' => $request->year]);
    //     }

    //      $financial->update();
    //     return redirect()->route('financials.list')->with('success', 'Document updated successfully');
    // }
    public function updateYear($id, Request $request)
    {
        $financial = Financial::findOrFail($id);
        $request->validate([
            'year' => ['required'],
            'filepath' => ['nullable', 'mimes:pdf,doc']
        ]);

        $oldYear = $financial->year;
        $this->processFileUpload($request, $financial);
        $financial->year = $request->year;
        $financial->quarter = $request->quarter;

        if ($financial->isDirty('year')) {
            Financial::where('year', $oldYear)->update(['year' => $request->year]);
        }

        $financial->update();

        return redirect()->route('financials.list')->with('success', 'Document updated successfully');
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
    
        // Delete the year and its related quarters
        Financial::where('year', $year->year)->delete();
    
        // You can also delete associated files, if necessary, using the $quarterIds
    
        return redirect()->route('financials.list')->with('success', 'Year and related quarters deleted successfully');
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
    // public function storeQuarter($year, $quarter, Request $request)
    // {
    //     $request->validate([
    //         'title' => ['required', 'string', 'max:100'],
    //         'filepath' => ['required', 'mimes:pdf,doc'] // Adjust allowed file types as needed
    //     ]);

    //     $file = $request->file('filepath');
    //     $originalName = $file->getClientOriginalName();
    //     $extension = $file->getClientOriginalExtension();
    //     $words = explode(' ', pathinfo($originalName, PATHINFO_FILENAME));
    //     $uniqueWords = array_unique($words);
    //     $cleanFileName = implode(' ', $uniqueWords);
    //     $file_name = Str::slug($cleanFileName) . '-' . time() . '.' . $extension;

    //     $dir = "uploads/reports/";
    //     // Store the file using the Storage facade
    //     $filepath = $file->storePubliclyAs($dir, $file_name);

    //     $financial = new Financial();
    //     $financial->year = $year;
    //     $financial->quarter = $quarter;
    //     $financial->title = $request->title;
    //     $financial->filepath = $filepath; // Store the path in the database, not the full URL

    //     $financial->save();

    //     return redirect("financials/list")->with('success', 'Quarter added successfully');
    // }

    public function storeQuarter($year, $quarter, Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:100'],
            'filepath' => ['required', 'mimes:pdf,doc']
        ]);

        $financial = new Financial();
        $financial->year = $year;
        $financial->quarter = $quarter;
        $financial->title = $request->title;

        $this->processFileUpload($request, $financial);

        $financial->save();

        return redirect()->route('financials.list')->with('success', 'Quarter added successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editQuarter($year, $quarter, $id)
    {
        // Retrieve the financial record based on the 'id'
        $financial = Financial::findOrFail($id);

        // You can also retrieve the year and quarter from the route parameters if needed

        // Assuming you need them in the view, you can pass them to the view as data
        return view('financials.editQuarter', compact('financial', 'year', 'quarter'));
    }

    // public function updateQuarter($year, $quarter, $id, Request $request)
    // {
    //     $financial = Financial::findOrFail($id);
    //     $request->validate([
    //         'title' => ['required'],
    //         'filepath' => ['nullable', 'mimes:pdf,doc'] // Adjust allowed file types as needed
    //     ]);

    //     // Update the financial record with the new values
    //     $financial->title = $request->title;
    //     $financial->year = $year;
    //     $financial->quarter = $quarter;
    //     $oldFileName = $financial->filepath;

    //     // Check if a new file is uploaded and update it if necessary
    //     if ($request->hasFile('filepath')) {
    //         $originalName = $request->file('filepath')->getClientOriginalName();
    //         $extension = $request->file('filepath')->getClientOriginalExtension();
    //         $words = explode(' ', pathinfo($originalName, PATHINFO_FILENAME));
    //         $uniqueWords = array_unique($words);
    //         $cleanFileName = implode(' ', $uniqueWords);
    //         $file_name = Str::slug($cleanFileName) . '-' . time() . '.' . $extension;
    //         $dir = "uploads/reports/";
    //         // Store the new file and get its path
    //         $newFileName = $request->file('filepath')->storeAs($dir, $file_name);
    //         if ($oldFileName) {
    //             Storage::move($newFileName, $oldFileName);
    //             $financial->filepath = $oldFileName;
    //         } else {
    //             $financial->filepath = $newFileName;
    //         }
    //     }
    //     $financial->update();
    //     return redirect()->route('financials.list')->with('success', 'Document updated successfully');
    // }
    public function updateQuarter($year, $quarter, $id, Request $request)
    {
        $financial = Financial::findOrFail($id);
        $request->validate([
            'title' => ['required'],
            'filepath' => ['nullable', 'mimes:pdf,doc']
        ]);

        $this->processFileUpload($request, $financial);
        $financial->title = $request->title;
        $financial->year = $year;
        $financial->quarter = $quarter;
        $financial->update();

        return redirect()->route('financials.list')->with('success', 'Document updated successfully');
    }

     /**
     * Common code for image.
     */
    private function processFileUpload($request, $financial)
    {
        if ($request->hasFile('filepath')) {
            $file = $request->file('filepath');
            $originalName = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $words = explode(' ', pathinfo($originalName, PATHINFO_FILENAME));
            $uniqueWords = array_unique($words);
            $cleanFileName = implode(' ', $uniqueWords);
            $file_name = Str::slug($cleanFileName) . '-' . time() . '.' . $extension;
            $dir = "uploads/reports";
            $financial->filepath = $file->storeAs($dir, $file_name);
        } else {
            $financial->filepath = null;
        }
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
