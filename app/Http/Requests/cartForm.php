<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class cartForm extends FormRequest
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
        return [
            'name'      => 'required|max:25',
            'number'    => 'required|digits:10',
            'adress'    => 'required',
            'city'      => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required'     => 'Необходимо указать имя',
            'name.max'          => 'Слишком длинное имя',
            'number.required'   => 'Необходимо указать номер',
            'number.digits'     => 'Неверно указан номер',
            'adress.required'   => 'Необходимо указать адресс',
            'city.required'     => 'Необходимо указать город',
        ];
    }

}
