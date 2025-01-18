<?php

namespace App\Http\Controllers\frontend;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Traits\FileUploadTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Requests\Frontend\CompanyFoundingInfoUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Auth;
use Illuminate\Validation\Rules;


class CompanyProfileController extends Controller
{

    use FileUploadTrait;
    function index(){
        $companyInfo = Company::where('user_id',auth()->user()->id)->first();
        return view('frontend.company-dashboard.profile.index',compact('companyInfo'));
    }

    function updateCompanyInfo(ProfileUpdateRequest $request) : RedirectResponse{

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

        notify()->success('data succesful updated ⚡️','success');

        return redirect()->back();
        // dd($data);
    }

    function foundingCompanyInfo(CompanyFoundingInfoUpdateRequest $request) :RedirectResponse {
        // dd($request->all());


        Company::updateOrCreate(
            ['user_id' => auth()->user()->id],
            [
                "industry_type_id"=>$request->industry_type_id,
                "organization_type_id"=>$request->organization_type_id,
                "team_size_id"=>$request->team_size_id,
                "establishment_date"=>$request->establishment_date,
                "website"=>$request->website,
                "email"=>$request->email,
                "phone"=>$request->phone,
                "country"=>$request->country,
                "state"=>$request->state,
                "city"=>$request->city,
                "address"=>$request->address,
                "map_link"=>$request->map_link
            ]
        );

        notify()->success('data succesful updated ⚡️','success');
        return redirect()->back();
    }

    function accountCompanyInfo(Request $request) : RedirectResponse{
        $validatedData = $request->validate([
            'name'=>['required','string','max:50'],
            'email'=>['required','email'],
        ]);

        Auth::user()->update($validatedData);
        notify()->success('data succesful updated ⚡️','success');

        return redirect()->back();
    }

    function passwordCompanyaccount(Request $request): RedirectResponse{
        $request->validate([
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        Auth::user()->update(['password'=>bcrypt($request->password)]);

        notify()->success('data succesful updated ⚡️','success');

        return redirect()->back();
    }
}
