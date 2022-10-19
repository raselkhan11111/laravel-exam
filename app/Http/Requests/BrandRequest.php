<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return True;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {



        $imageValitionRules = 'image|mimes:jpg,png,jpeg,gif';
        if ($this->isMethod('post')) {
            $imageValitionRules = 'required|' . $imageValitionRules;
        }
        return [
            'name' => 'required|min:2|max:10|unique:brands,id,' . $this->brand?->id,
            'color_id' => 'required',


            // 'seats' => ' required|integer|size:10';

            'description' => 'required|string',
            'image' => $imageValitionRules


        ];
        //

    }


    public function messages()
    {
        return [
            'name.required' => 'A title is required',
            'name.unique' => 'Database check kore dekheci eta ace',
            'name.string' => 'dasdas',
            'color_id.required' => "category_id Field is Required",

        ];
    }
}
