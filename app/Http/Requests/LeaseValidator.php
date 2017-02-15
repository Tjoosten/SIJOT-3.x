<?php

namespace Sijot\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LeaseValidator extends FormRequest
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
            'start_date'    => 'required',
            'end_date'      => 'required',
            'email_address' => 'required',
            'group_name'    => 'required',
        ];
    }
}
