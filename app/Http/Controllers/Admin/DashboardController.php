<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $trashed = Lead::onlyTrashed()->get()->count();
        $totalLeads = Lead::all();
        $leads = Lead::orderBy('created_at', 'desc')->paginate(5);

        return view('dashboard', compact('leads','totalLeads', 'trashed'));
    }


}
