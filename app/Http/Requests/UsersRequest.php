<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use const true;

class UsersRequest extends Request
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
            //
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required|min:6|confirmed',
            'role_id'=>'required',
            'path'=>'mimetypes:image/jpg,image/jpeg,image/png,image/gif'
        ];
    }
}
