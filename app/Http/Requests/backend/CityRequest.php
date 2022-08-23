<?php

namespace App\Http\Requests\backend;

use Illuminate\Foundation\Http\FormRequest;

class CityRequest extends FormRequest
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
                    'name' => 'required | MAX:255 |unique:cities,name',
                    'state_id' => 'required',
                    'status' => 'required',

                ];
            }

            case 'PUT'  :
            case 'PATCH' :
            {
                return [
                    'name' => 'required | MAX:255 |unique:cities,name,' . $this->route()->city->id,
                    'state_id' => 'required',
                    'status' => 'required',

                ];
            }
            default :
                break;

        }

    }
}
