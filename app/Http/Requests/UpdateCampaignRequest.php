<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCampaignRequest extends FormRequest
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
            'banner' => 'nullable',
            'banner.*' => 'nullable|image|mimes:jpeg,bmp,png,jpg,gif,JPG'
        ];
    }
}
