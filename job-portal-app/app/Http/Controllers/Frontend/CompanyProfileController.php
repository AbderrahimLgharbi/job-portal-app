<?php

namespace App\Http\Controllers\frontend;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Traits\FileUploadTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
  
class CompanyProfileController extends Controller
{

    use FileUploadTrait;
    function index(){
        $companyInfo = Company::where('user_id',auth()->user()->id)->first();
        return view('frontend.company-dashboard.profile.index',compact('companyInfo'));
    }

    function updateCompanyInfo(ProfileUpdateRequest $request){

        $logopath = $this->uploadFile($request,'logo');
        $bannerpath = $this->uploadFile($request,'banner');

        $data = [];
        if(!empty($logopath)) $data['logo']=$logopath;
        if(!empty($bannerpath)) $data['banner']=$bannerpath;
        $data['name']=$request->name;
        $data['bio']=$request->bio;
        $data['vision']=$request->vision;


        Company::updateOrCreate(
            ['user_id' => auth()->user()->id],
            $data
        );

        return redirect()->back();
        // dd($data);
    }
}
