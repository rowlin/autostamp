<?php

namespace App\Http\Requests\Store;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class CreateRequest extends FormRequest
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
            'name' => 'required',
            'description' => 'nullable',
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
