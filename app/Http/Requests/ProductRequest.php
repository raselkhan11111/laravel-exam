<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
    


            $imageValitionRules='image|mimes:jpg,png,jpeg,gif';
        if($this->isMethod('post')){
            $imageValitionRules= 'required|'.$imageValitionRules;
        }
        return [
            'title' => 'required|string|max:255|min:3|unique:courses,title,'
            .$this->id,
            'category_id' => 'required',
            'price' => 'required|digits_between:1,6',

            // 'seats' => ' required|integer|size:10';
            
            'description' => 'required|string',
            'image'=>$imageValitionRules


        ];
            //
        
    }


    public function messages()
    {
        return [
            'title.required' => 'A title is required',
            'title.unique' => 'Database check kore dekheci eta ace',
            'title.string' => 'dasdas',
            'category_id.required'=> "category_id Field is Required",
            'price.required.' => "price requried"
        ];
    }
}
