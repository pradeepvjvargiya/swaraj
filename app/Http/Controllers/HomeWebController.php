<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;

class HomeWebController extends Controller
{
    public function index()
    {
        return view('frontends.index');    
    }

    public function team()
    {   
        $teams = Team::orderBy('order_at', 'asc')->get();

        return view('frontends.board-of-directors', compact('teams'));    
    }
}
