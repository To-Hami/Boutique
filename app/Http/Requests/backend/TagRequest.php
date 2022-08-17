<?php

namespace App\Http\Requests\backend;

use Illuminate\Foundation\Http\FormRequest;

class TagRequest extends FormRequest
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

                ];
            }

            case 'PUT'  :
            case 'PATCH' :
            {
                return [
                    'name' => 'required | MAX:255 |unique:categories,name,' . $this->route()->tag->id,
                    'status' => 'required',

                ];
            }
            default :
                break;

        }

    }
}
