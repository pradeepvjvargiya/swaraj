<?php

namespace App\Http\Controllers;

use App\Helpers\FileHelpers;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReportController extends Controller
{
    /**
        * Create constructor for year (document in quarterly)
    */
    public $allowedPages = [];
    public function __construct()
    {
        $this->allowedPages = ["financial", "shareholding-pattern"];
    }
    /**
     * Display a listing of the resource.
     */
    public function index($page)
    {
        if (in_array($page, $this->allowedPages))
        {
            // Fetch reports based on the specific criteria for this page
            $reports = Report::where('page', $page)->whereNull('quarter')->orderBy('id', 'desc')->get();
            return view('reports.list', ['page' =>$page, 'reports' =>$reports]);
        } else {
            // Handle the case where $page is not one of the expected values
            return abort(404); // Or any other appropriate action
        }
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function addYear($page)
    {
        if (in_array($page, $this->allowedPages)) {
            return view('reports.addYear', ['page' => $page]);
        } else {
            // Handle the case where $page is not one of the expected values
            return abort(404); // Or any other appropriate action
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeYear($page, Request $request)
    {
        $request->validate([
            'year' => ['required'],
            'filepath' => ['nullable', 'mimes:pdf,doc'] // Adjust allowed file types as needed
        ]);

        $reports = new Report();
        $reports->page = $page;
        $reports->year = $request->year;
        if ($request->hasFile('filepath')) {
            // Get the directory path from the FileHelper
            $dir = FileHelpers::fileUpdate($page, $request);
          
            // Store the image only if a file is provided
            $reports->filepath = $dir;
        }
        $reports->save();
        return redirect()->route('reports.list', $page)->with('success', 'Year added successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editYear($page, string $id)
    {
        $report = Report::first();
        return view('reports.editYear', compact('page', 'id', 'report'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateYear($page, $id, Request $request)
    {
        $report = Report::findOrFail($id);
        $request->validate([
            'year' => ['required'],
            'filepath' => ['nullable', 'mimes:pdf,doc'] // Adjust allowed file types as needed
        ]);

        $oldYear = $report->year; // Store the old year value

        // Update the financial record with the new values
        $report->year = $request->year;
        $report->quarter = $request->quarter;
        $oldFileName = $report->filepath;

        // Check if a new file is uploaded and update it if necessary
        if ($request->hasFile('filepath')) {
            // Get the directory path from the FileHelper
            $newFileName  = FileHelpers::fileUpdate($page, $request);
            if ($oldFileName) {
                Storage::move($newFileName, $oldFileName);
                $report->filepath = $oldFileName;
            } else {
                $report->filepath = $newFileName;
            }
        }
        // Check if the year has changed before updating the database
        if ($report->isDirty('year')) {
            // Perform the update only if 'year' has changed
            Report::where('year', $oldYear)
                ->update(['year' => $request->year]);
        }

         $report->update();
         return redirect()->route('reports.list', $page)->with('success', 'Year added successfully');
        }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($page, $id)
    {
        // Find the year to be deleted
        $year = Report::findOrFail($id);

        // Get the ID of the year's related quarters
        $years = Report::where('year', $year->year);

        // Iterate through the quarters, retrieve file paths, and delete files
        foreach ($years as $year) {
            $filePath = $year->filepath;

            // Delete the associated file if it exists
            if ($filePath && Storage::exists($filePath)) {
                Storage::delete($filePath);
            }
        }

        // Delete the year and its related quarters
        Report::where('year', $year->year)->delete();
        return redirect()->route('reports.list', $page)->with('success', 'Year and related quarters and files deleted successfully');
    }

    /**
     * For Add Quarter.
     * Show the form for creating a new resource.
     */
    public function addQuarter($page, $year, $quarter)
    {
        return view('reports.addQuarter', compact('page', 'year', 'quarter'));
    }

     /**
     * Store a newly store resource in storage.
     */
    public function storeQuarter($page, $year, $quarter, Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:100'],
            'filepath' => ['nullable', 'mimes:pdf,doc'] // Adjust allowed file types as needed
        ]);

        $report = new Report();
        $report->page = $page;
        $report->year = $year;
        $report->quarter = $quarter;
        $report->title = $request->title;
        if ($request->hasFile('filepath')) {
            // Get the directory path from the FileHelper
            $dir_quarter_file = FileHelpers::fileUpdate($page, $request);
            $report->filepath = $dir_quarter_file;
        }
        $report->save();
        return redirect()->route('reports.list', $page)->with('success', 'Quarter added successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editQuarter($page, $year, $quarter, $id)
    {
        // Retrieve the financial record based on the 'id'
        $report = Report::findOrFail($id);

        // Assuming you need them in the view, you can pass them to the view as data
        return view('reports.editQuarter', compact('report', 'page', 'year', 'quarter'));
    }

    public function updateQuarter($page, $year, $quarter, $id, Request $request)
    {
        $report = Report::findOrFail($id);
        $request->validate([
            'title' => ['required'],
            'filepath' => ['nullable', 'mimes:pdf,doc'] // Adjust allowed file types as needed
        ]);

        // Update the financial record with the new values
        $report->title = $request->title;
        $report->page = $page;
        $report->year = $year;
        $report->quarter = $quarter;
        $oldFileName = $report->filepath;

        // Check if a new file is uploaded and update it if necessary
        if ($request->hasFile('filepath')) {
            // Get the directory path from the FileHelper
            $dir_quarter_file = FileHelpers::fileUpdate($page, $request);

            //store image
            $newFileName = $dir_quarter_file;
            if ($oldFileName) {
                Storage::move($newFileName, $oldFileName);
                $report->filepath = $oldFileName;
                } else {
                    $report->filepath = $newFileName;
                }
        }
        $report->update();
        return redirect()->route('reports.list', $page)->with('success', 'Document updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyQuarter($page, $year, $quarter, $id)
    {
        // Find the financial record by its ID
        $report = Report::findOrFail($id);

        // Verify that the 'year' and 'quarter' in the URL match the record
        if ($report->year == $year && $report->quarter == $quarter) {
            // Get the file path from the financial record
            $filePath = $report->filepath;

            // Delete the associated file if it exists
            if ($filePath && Storage::exists($filePath)) {
                Storage::delete($filePath);
            }

            // Perform the deletion of the financial record
            $report->delete();

            // Redirect to a success page or a different route as needed
            return redirect()->route('reports.list', $page)->with('success', 'Quarter deleted successfully');
        }
    }
}
