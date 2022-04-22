<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCampaignRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'from_date' => 'required|date',
            'to_date' => 'required|date',
            'total_budget' => 'required|numeric|min:1',
            'daily_budget' => 'required|numeric|min:1',
            'banner' => 'required',
            'banner.*' => 'required|image|mimes:jpeg,bmp,png,jpg,gif,JPG'
        ];
    }


    /*
    * for custom validation message
    */


    public function messages()
    {
        return [
            'banner.*.required' => "The image must be an image.",
            'banner.*.mimes' => "The image must be a file of type: jpeg, bmp, png, jpg, gif, JPG."
        ];
    }


}
