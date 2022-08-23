<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class CustomerAddressRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {

        switch ($this->method()) {
            case 'POST' :
            case 'PUT'  :
            case 'PATCH' :
                {
                    return [
                        'address_title' => 'required',
                        'first_name' => 'required',
                        'last_name' => 'required',
                        'email' => 'required',
                        'mobile' => 'required',
                        'address' => 'required',
                        'address2' => '',
                        'default_address' => 'nullable',
                        'zip_code' => 'required',
                        'country_id' => 'required',
                        'state_id' => 'required',
                        'city_id' => 'required',
                        'po_box' => 'required',
                        'user_id' => 'required',

                    ];
                }

            default :
                break;

        }

    }
}
