<?php
namespace App\Helpers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FileHelpers
{
    public static function fileUpdate($page, Request $request)
    {
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
        if(isset($folder)){
            $dir = "uploads/$folder/".$file_name;
        }
        else
        {
            $dir = "uploads/".$file_name;
        }
        // Store the image only if a file is provided
        $file = $request->file('filepath')->storeAs($dir);

        return $file;
    }
}

