<?php

namespace App\Http\Requests\backend;

use Illuminate\Foundation\Http\FormRequest;

class customerRequest extends FormRequest
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

                    'first_name' => 'required',
                    'last_name' => 'required',
                    'username' => 'required',
                    'email' => 'required | email |unique:users,email',
                    'mobile' => 'required | numeric |unique:users,mobile',
                    'password' => 'required',
                    'customer_image' => 'nullable | MAX:3000 |mimes:jpg,jpeg,png,gif',
                ];
            }

            case 'PUT'  :
            case 'PATCH' :
            {
                return [
                    'first_name' => 'required',
                    'last_name' => 'required',
                    'username' => 'required',
                    'email' => 'required | email |unique:users,email,' . $this->route()->customer->id,
                    'mobile' => 'required | numeric |unique:users,mobile,'. $this->route()->customer->id,
                    'customer_image' => 'nullable | MAX:3000 |mimes:jpg,jpeg,png,gif',
                ];
            }
            default :
                break;

        }

    }
}
