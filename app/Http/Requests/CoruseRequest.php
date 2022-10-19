<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CoruseRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        // return [
        //     'title' => 'required|unique:courses|string|max:255|min:3',
        //     'category' => 'required',
        //     'type' => 'required',

        //     // 'seats' => ' required|integer|size:10';
        //     'duration' => 'required|digits_between:1,2',
        //     'startdate' => 'required'


        // ];

       

        $imageValitionRules='image|mimes:jpg,png,jpeg,gif';
        if($this->isMethod('post')){
            $imageValitionRules= 'required|'.$imageValitionRules;
        }
        return [
            'title' => 'required|string|max:255|min:3|unique:courses,title,'
            .$this->id,
            'category' => 'required',
            'type' => 'required',

            // 'seats' => ' required|integer|size:10';
            'duration' => 'required|digits_between:1,3',
            'startdate' => 'required',
            'image'=>$imageValitionRules


        ];


        // if ($this->method() == 'POST') {
        //     return [
        //         'title' => 'required|unique:courses|string|max:255|min:3',
        //         'category' => 'required',
        //         'type' => 'required',

        //         // 'seats' => ' required|integer|size:10';
        //         'duration' => 'required|digits_between:1,2',
        //         'startdate' => 'required',
        //         'image'=>'required|image|mimes:jpg,png,jpeg,gif'


        //     ];
        // }
        // if ($this->method() == 'PUT') {
        //     return [
        //         'id' => 'required',
        //         'title' => 'required|string|max:255|min:3|unique:courses,title,' . $this->get('id'),
        //         'category' => 'required',
        //         'type' => 'required',

        //         // 'seats' => ' required|integer|size:10';
        //         'duration' => 'required|digits_between:1,2',
        //         'startdate' => 'required'
        //     ];
        // }
    }


    public function messages()
    {
        return [
            'title.required' => 'A title is required',
            'title.unique' => 'Database check kore dekheci eta ace',
            'title.string' => 'dasdas',
            'type.required'=> "Type Field is Required",
            'startdate.required.' => "date requried"
        ];
    }
}
