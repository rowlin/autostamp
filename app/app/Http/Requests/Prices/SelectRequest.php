<?php

namespace App\Http\Requests\Prices;

use Illuminate\Foundation\Http\FormRequest;

class SelectRequest extends FormRequest
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
            "starts_at" => 'nullable',
            'store_id' => 'nullable'
        ];
    }

    /** Return all data as array
     * @return array
     */

    public function validationData()
    {
        return array_merge($this->request->all(),$this->route()->parameters());
    }
}
