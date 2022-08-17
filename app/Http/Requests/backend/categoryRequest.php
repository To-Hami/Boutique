<?php

namespace App\Http\Requests\backend;

use Illuminate\Foundation\Http\FormRequest;

class categoryRequest extends FormRequest
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
                    'name' => 'required | MAX:255 |unique:categories,name',
                    'status' => 'required',
                    'parent_id  ' => 'nullable',
                    'cover' => 'required | MAX:2000 |mimes:jpg,jpeg,png',
                ];
            }

            case 'PUT'  :
            case 'PATCH' :
            {
                return [
                    'name' => 'required | MAX:255 |unique:categories,name,' . $this->route()->category->id,
                    'status' => 'required',
                    'parent_id  ' => 'nullable',
                    'cover' => 'nullable | MAX:2000 |mimes:jpg,jpeg,png',
                ];
            }
            default :
                break;

        }

    }
}
