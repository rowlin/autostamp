<?php

namespace App\Http\Requests\Product;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class UpdateRequest extends FormRequest
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
            'code' => 'required',
            'name' => 'required',
            'description' => 'nullable',
            'has_delete' => 'nullable',
            'image' => 'nullable|image|mimes:png,jpg,jpeg|dimensions:min_width=100,min_height=100,max_width=500,max_height=500|max:25000'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $this->flash();
        $response = redirect()->back()->withErrors($validator);

        throw (new ValidationException($validator, $response))
            ->errorBag($this->errorBag);
    }


}
