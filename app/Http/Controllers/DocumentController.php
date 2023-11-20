<?php

namespace App\Http\Controllers;

use App\Helpers\FileHelpers;
use App\Helpers\UserLogHelpers;
use App\Models\Document;    
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($page)
    {
        $documents = Document::where('page', $page)->orderBy("id", "desc")->get();
        return view('documents.list', ['documents' => $documents, 'page' => $page]);
    }

    /**
     * Show the form for creating a new resource.
    */
    public function create($page)
    {
        return view('documents.add', ['page' => $page]);
    }

    /**
     * Store a newly created resource in storage.
    */
    public function store($page, Request $request)
    {
        $request->validate([
            'title' => ['nullable', 'string'],
            'date' => ['nullable'],
            'filepath' => ['nullable', 'mimes:pdf,doc,mp3,mp4'] // Adjust allowed file types as needed
        ]);
        $document = new Document();
        $document->page = $page;
        $document->title = $request->title;
        $document->date = $request->date;
        if ($request->hasFile('filepath')) {

            // Get the directory path from the FileHelper
            $year_file_dir = FileHelpers::fileUpdate($page, $request);

            // Store the image only if a file is provided
            $document->filepath = $year_file_dir;
        }
        
        $document->user_id = auth()->user()->id;
        $document->save();

        // Log user action using LogHelpers
        $inserted_data = json_encode([
            'title' => $document['title'],
            'date' => $document['date'],
            'filepath' => $document['filepath'],
        ]);
        UserLogHelpers::user_log_action(
            auth()->user()->id,
            $document->page,
            $document->id,
            null,
            null,
            $inserted_data);
        return redirect("documents/{$page}/list")->with('success', 'Document added successfully');
    }

    /**
        * Display the specified resource.
    */
    public function edit($page, string $id)
    {
        $document = Document::where('page', $page)
                            ->Where('id', $id)
                            ->first();
        return view('documents.view', compact('page', 'id', 'document'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($page, $id, Request $request)
    {
        $document = Document::findOrFail($id);
        $request->validate([
            'title' => ['nullable', 'string'],
            'date' => ['nullable'],
            'filepath' => ['nullable', 'mimes:pdf,doc,mp3,mp4'] // Adjust allowed file types as needed
        ]);

        // Store the current document data for logging
        $prev_data = $document->toArray();

        // Update the document fields
        $document->title = $request->title;
        $document->date = $request->date;
        $oldFileName = $document->filepath;

        // Check if a new file is uploaded and update it if necessary
        if ($request->hasFile('filepath')) {
            // Get the directory path from the FileHelper
            $newFileName  = FileHelpers::fileUpdate($page, $request);
            if ($oldFileName) { 
                Storage::move($newFileName, $oldFileName);
                $document->filepath = $oldFileName;
                } else {
                    $document->filepath = $newFileName;
                }
        }
        $document->update();

        //get changes fields only
        $changes = $document->getChanges();
        if($changes) {
            $old_data = [];
            foreach($changes as $key => $value) {
                $old_data[$key] = $prev_data[$key];
            }

            // update_log
            UserLogHelpers::user_log_action(
                auth()->user()->id,
                $document->page,
                $document->id,
                null, // Assuming report_id is not used in this context
                json_encode($old_data),
                json_encode($changes)
            );
        }
        return redirect("documents/{$page}/list")->with('success', 'Document updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($page, $id)
    {
        // Find the document respective page record
        $document = Document::find($id);
        if ($document) {
            $filePath = $document->filepath;
            if ($filePath && Storage::exists($filePath)) {
                Storage::delete($filePath);
            }

            // Delete the document record
            $document->delete();

            return redirect("documents/{$page}/list")->with('success', 'Document deleted successfully');
        }
    }
}
