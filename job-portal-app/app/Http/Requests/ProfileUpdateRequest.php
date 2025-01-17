<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

use App\Models\Company;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        $rules= [
            'logo' => ['image','max:1500'],
            'banner' => ['image','max:1500'],
            'name' => ['required','string','max:100'],
            'bio' => ['required'],
            'vision' => ['required'],
        ];

        $company = Company::where('user_id',auth()->user()->id)->first();

        if(empty($company) || !$company?->logo){
            $rules['logo'][] = 'required';
        }
        if(empty($company) || !$company?->banner){
            $rules['banner'][] = 'required';
        }
        return $rules;
    }
}
