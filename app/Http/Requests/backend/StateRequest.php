<?php

namespace App\Http\Requests\backend;

use Illuminate\Foundation\Http\FormRequest;

class StateRequest extends FormRequest
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
                    'name' => 'required | MAX:255 |unique:states,name',
                    'country_id' => 'required',
                    'status' => 'required',
                ];
            }

            case 'PUT'  :
            case 'PATCH' :
            {
                return [
                    'name' => 'required | MAX:255 |unique:states,name,' . $this->route()->state->id,
                    'country_id' => 'required',
                    'status' => 'required',

                ];
            }
            default :
                break;

        }

    }
}
