<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     public function index($page, Request $request)
     {
         $documents = Document::where('page', $page)
                                ->orderBy("id", "desc")->paginate(5);
         return view('documents.list', [
            'documents' => $documents,
            'page' => $page, // Pass the 'page' parameter to the view
        ]);
     }

     /**
     * Show the form for creating a new resource.
     */
    public function create($page)
    {
        return view('documents.add', ['page' => $page]);
    }

    /**
     * common code for image.
     */
    protected function handleImage(Request $request, $document, $page)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:100'],
            'date' => ['required'],
            'filepath' => ['nullable']
        ]);

        // Update the document fields
        $document->title = $request->title;
        $document->date = $request->date;
        $oldFileName = $document->filepath;

        // Check if a new file is uploaded and update it if necessary
        if ($request->hasFile('filepath')) {
            $originalName = $request->file('filepath')->getClientOriginalName();
            $extension = $request->file('filepath')->getClientOriginalExtension();
            $words = explode(' ', pathinfo($originalName, PATHINFO_FILENAME));
            $uniqueWords = array_unique($words);
            $cleanFileName = implode(' ', $uniqueWords);
            $file_name = Str::slug($cleanFileName) . '-' . time() . '.' . $extension;

            // Your condition here to determine the folder based on your criteria
            if ($page == 'notices' || $page == 'outcomes' || $page == 'general-meetings' || $page == 'voting-results') {
                $folder = 'notices';
            } elseif ($page == 'shareholding-pattern') {
                $folder = 'shp';
            } elseif ($page == 'financial' || $page == 'annual-return' || $page == 'policy') {
                $folder = 'reports';
            } elseif ($page == 'listing-compliances') {
                $folder = 'Listing_Compliances';
            }

            if (isset($folder)) {
                $dir = "uploads/$folder" . $file_name;
            } else {
                $dir = "uploads/" . $file_name;
            }

            // Store the new file and get its path
            $newFileName = $request->file('filepath')->storeAs($dir);
            if ($oldFileName) {
                Storage::move($newFileName, $oldFileName);
            }

            $document->filepath = $oldFileName;
        }
    }

    /**
     * Store a newly created resource in storage.
    */
    // public function store($page, Request $request)
    // {
    //     $request->validate([
    //         'title' => ['required', 'string', 'max:100'],
    //         'date' => ['required'],
    //         'filepath' => ['nullable']
    //     ]);
    //     $document = new Document();
    //     $document->page = $page;
    //     $document->title = $request->title;
    //     $document->date = $request->date;
    //     $originalName = $request->file('filepath')->getClientOriginalName();
    //     $extension = $request->file('filepath')->getClientOriginalExtension();
    //     $words = explode(' ', pathinfo($originalName, PATHINFO_FILENAME));
    //     $uniqueWords = array_unique($words);
    //     $cleanFileName = implode(' ', $uniqueWords);
    //     $file_name = Str::slug($cleanFileName) . '-' . time() . '.' . $extension;

    //     // Your condition here to determine the folder based on your criteria
    //     if ($page == 'notices' || $page == 'outcomes' || $page == 'general-meetings' || $page == 'voting-results') {
    //         $folder = 'notices';
    //     } elseif ($page == 'shareholding-pattern') {
    //         $folder = 'shp';
    //     } elseif ($page == 'financial' || $page == 'annual-return' || $page == 'policy') {
    //         $folder = 'reports';
    //     } elseif ($page == 'listing-compliances') {
    //         $folder = 'Listing_Compliances';
    //     }
    //     if(isset($folder)){
    //         $dir = "uploads/$folder/".$file_name;
    //     }
    //     else
    //     {
    //         $dir = "uploads/".$file_name;
    //     }

    //     //store image
    //     $document->filepath = $request->file('filepath')->storeAs($dir);
    //     $document->user_id = auth()->user()->id;
    //     $document->save();
    //     return redirect("documents/{$page}/list")->with('success', 'Document added successfully');
    // }

    public function store($page, Request $request)
    {
        $document = new Document();
        $document->page = $page;
        $this->handleImage($request, $document, $page);
        $document->user_id = auth()->user()->id;
        $document->save();
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
    // public function update($page, $id, Request $request)
    // {
    //     $document = Document::findOrFail($id);
    //     $request->validate([
    //         'title' => ['required', 'string', 'max:100'],
    //         'date' => ['required'],
    //     ]);

    //     // Update the document fields
    //     $document->title = $request->title;
    //     $document->date = $request->date;
    //     $oldFileName = $document->filepath;

    //     // Check if a new file is uploaded and update it if necessary
    //     if ($request->hasFile('filepath')) {
    //         $originalName = $request->file('filepath')->getClientOriginalName();
    //         $extension = $request->file('filepath')->getClientOriginalExtension();
    //         $words = explode(' ', pathinfo($originalName, PATHINFO_FILENAME));
    //         $uniqueWords = array_unique($words);
    //         $cleanFileName = implode(' ', $uniqueWords);
    //         $file_name = Str::slug($cleanFileName) . '-' . time() . '.' . $extension;

    //         // Your condition here to determine the folder based on your criteria
    //         if ($page == 'notices' || $page == 'outcomes' || $page == 'general-meetings' || $page == 'voting-results') {
    //             $folder = 'notices';
    //         } elseif ($page == 'shareholding-pattern') {
    //             $folder = 'shp';
    //         } elseif ($page == 'financial' || $page == 'annual-return' || $page == 'policy') {
    //             $folder = 'reports';
    //         } elseif ($page == 'listing-compliances') {
    //             $folder = 'Listing_Compliances';
    //         }
    //         if(isset($folder)){
    //             $dir = "uploads/$folder/".$file_name;
    //         }
    //         else
    //         {
    //             $dir = "uploads/".$file_name;
    //         }

    //         //store image
    //         $newFileName = $request->file('filepath')->storeAs($dir);
    //         Storage::move($newFileName, $oldFileName);
    //         $document->user_id = auth()->user()->id;
    //     }

    //     $document->update();
    //     return redirect("documents/{$page}/list")->with('success', 'Document updated successfully');
    // }

    public function update($page, $id, Request $request)
    {
        $document = Document::findOrFail($id);
        $this->handleImage($request, $document, $page);
        $document->user_id = auth()->user()->id;
        $document->update();
        return redirect("documents/{$page}/list")->with('success', 'Document updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($page, $id)
    {
        // Find the document respective page record
        $document = Document::find($id);
        {
            $document->delete();
            return redirect("documents/{$page}/list")->with('success', 'Document deleted successfully');
        }
    }
}
