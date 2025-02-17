<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class CompanyFoundingInfoUpdateRequest extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "industry_type_id"=>['required','integer'],
            "organization_type_id"=>['required','integer'],
            "team_size_id"=>['required','integer'],
            "establishment_date"=>['required','date'],
            "website"=>['required','active_url'],
            "email"=>['required','email'],
            "phone"=>['integer'],
            "country"=>['string'],
            "state"=>['string'],
            "city"=>['string'],
            "address"=>['required','string','max:255'],
            "map_link"=>['nullable'],
        ];
    }
}
