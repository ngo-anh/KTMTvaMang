<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class CompanyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (Auth::user()) {
            if (Auth::user()->level == 0) {
                return true;
            }
        }
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'company__name' => 'required|min:5|max:1000',
            'company__description' => 'required|min:5',
            'company__address' => 'required|min:5',
            'company__image' => 'required'
        ];
    }
}
