<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreArea extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'Name_ar' => 'required',
            'Name_en' => 'required',
            'id_city' => 'required',
            'Id_Governmentes' => 'required',
            'Id_country' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'Name.required' =>  trans('validation.required') ,
        ];
    }
}
