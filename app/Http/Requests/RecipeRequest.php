<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecipeRequest extends FormRequest
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
        if ($this->method() == 'PUT')
        {
            $name = 'required|unique:recipes,name,'. $this->get('id');
        } else {
            $name = 'required|unique:recipes,name,';
        }

        return [
            'name' => $name,
            'description' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png|',
        ];
    }
}