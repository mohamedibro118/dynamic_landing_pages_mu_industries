<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class provinceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name_ar' => 'required|unique:provinces,name_ar,|max:255',
            'name_en' => 'required|unique:provinces,name_en|max:255',
        ];
    }
   
    public function messages()
    {
        return [
            'name_ar.required' => 'Please enter the province arabic name',
            'name_ar.unique' => 'arabic name of provinces must be unique',
            'name_en.required' => 'Please enter the province english name',
            'name_en.unique' => 'english name of provinces must be unique',
            
            
        ];
    }
    
        
    
}
