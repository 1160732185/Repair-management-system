<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Repair_Request extends FormRequest
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
    /*        'worknumber'=>'required',
            'department'=>'required',*/
            'phone'=>'required|min:8',
            'description'=>'required|min:5',
            'equipment_id'=>'required'
        ];
    }
}
