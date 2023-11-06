<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\Report;
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

    public function document()
    {
        $page = '';
        $view = '';

        if (url()->current() == url('annual-return')) {
            $page = 'annual-return';
            $view = 'frontends.annual-return';
        } elseif (url()->current() == url('notices')) {
            $page = 'notices';
            $view = 'frontends.notices';
        } elseif (url()->current() == url('outcomes')) {
            $page = 'outcomes';
            $view = 'frontends.outcomes';
        } elseif (url()->current() == url('general-meetings')) {
            $page = 'general-meetings';
            $view = 'frontends.general-meetings';
        } elseif (url()->current() == url('voting-results')) {
            $page = 'voting-results';
            $view = 'frontends.voting-results';
        } elseif (url()->current() == url('policy')) {
            $page = 'policy';
            $view = 'frontends.policy';
        } elseif (url()->current() == url('prospectus')) {
            $page = 'prospectus';
            $view = 'frontends.prospectus';
        } elseif (url()->current() == url('listing-compliances')) {
            $page = 'listing-compliances';
            $view = 'frontends.listing-compliances';
        }

        $documents = Document::where('page', $page)->orderBy("id", "desc")->get();

        return view($view, ['page' => $page, 'documents' => $documents]);
    }

    public function report()
    {
        $page ='';
        $view ='';
        if (url()->current() == url('financial')) {
            $page = 'financial';
            $view = 'frontends.financial';
        } elseif (url()->current() == url('shareholding-pattern')) {
            $page = 'shareholding-pattern';
            $view = 'frontends.shareholding-pattern';
        }
            $reports = Report::where('page', $page)->whereNull('quarter')->orderBy('id', 'desc')->get();
            return view($view, ['page' => $page, 'reports' => $reports]);
    }
}
