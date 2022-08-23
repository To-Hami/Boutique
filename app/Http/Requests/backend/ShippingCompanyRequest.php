<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class ShippingCompanyRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        switch ($this->method()) {
            case 'POST' :
                {
                    return [

                        'name' => 'required',
                        'code' => 'required |unique:shipping_companies,code',
                        'description' => 'required',
                        'cost' => 'required  | numeric',
                        'fast' => 'required',
                        'status' => 'required',
                        'countries' => 'required',
                    ];
                }

            case 'PUT'  :
            case 'PATCH' :
                {
                    return [
                        'name' => 'required',
                        'code' => 'required |unique:shipping_companies,code,'.$this->route()->shipping_company->id,
                        'description' => 'required',
                        'cost' => 'required  | numeric',
                        'fast' => 'required',
                        'status' => 'required',
                        'countries' => 'required',
                    ];
                }
            default :
                break;

        }
    }
}
