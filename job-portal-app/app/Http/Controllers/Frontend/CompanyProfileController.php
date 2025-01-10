<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CompanyProfileController extends Controller
{
    function index(){
        return view('frontend.company-dashboard.profile.index');
    }
}
