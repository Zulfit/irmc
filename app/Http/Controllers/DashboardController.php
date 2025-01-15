<?php

namespace App\Http\Controllers;

use App\Models\Academician;
use App\Models\Project;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalAcademicians = Academician::count();
        $totalProjects = Project::count();
        return view('dashboard', compact('totalAcademicians','totalProjects'));
    }
}
