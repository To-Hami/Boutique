<?php

namespace App\Http\Requests\backend;

use Illuminate\Foundation\Http\FormRequest;

class CouponRequest extends FormRequest
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
                    'code' => 'unique:coupons,code',
                    'status' => 'required',
                    'greater_than' => 'nullable |numeric',
                    'type' => 'required',
                    'value' => 'required',
                    'use_times' => 'required',
                    'description' => 'nullable',
                    'start_date' => 'nullable |date',
                    'expire_date' => 'required_with:start_date |date',

                ];
            }

            case 'PUT'  :

            {
                return [
                    'code' => 'unique:coupons,code,' . $this->route()->coupon->id,
                    'status' => 'required',
                    'greater_than' => 'nullable |numeric',
                    'type' => 'required',
                    'value' => 'required',
                    'use_times' => 'required',
                    'description' => 'nullable',
                    'start_date' => 'nullable |date',
                    'expire_date' => 'required_with:start_date |date',

                ];
            }
            default :
                break;

        }

    }
}
