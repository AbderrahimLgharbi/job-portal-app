<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class CandidateDashboardController extends Controller
{
    function index(){
        return view('frontend.candidate-dashboard.dashboard');
    }
}