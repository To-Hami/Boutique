<?php

namespace App\Http\Requests\backend;

use Illuminate\Foundation\Http\FormRequest;

class productRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {

        switch ($this->method()) {
            case 'POST' :
            {
                return [

                    'name' => 'required',
                    'description' => 'required',
                    'price' => 'required | numeric',
                    'quantity' => 'required  | numeric',
                    'category_id' => 'required',
                    'tags.*' => 'required',
                    'status' => 'required',
                    'featured' => 'required',
                    'images' => 'required',
                    'images.*' => ' MAX:3000 |mimes:jpg,jpeg,png,gif',
                ];
            }

            case 'PUT'  :
            case 'PATCH' :
            {
                return [
                    'name' => 'required',
                    'description' => 'required',
                    'price' => 'required | numeric',
                    'quantity' => 'required  | numeric',
                    'category_id' => 'required',
                    'tags.*' => 'required',
                    'status' => 'required',
                    'featured' => 'required',
                    'images' => 'nullable',
                    'images.*' => ' MAX:3000 |mimes:jpg,jpeg,png,gif',
                ];
            }
            default :
                break;

        }

    }
}
