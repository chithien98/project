<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'=>'required|max:191',
            'email'=>'required|email|unique:users',
            'password'=>'required',
            'phone'=>'required|max:191',
            'message'=>'required|max:191',
            'avatar'=>'image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'required'=>':attribute :Không được để trống',
            'max'=>':attribute :Không được quá :max ký tự',
            'email.email'=>':attribute :email sai định dạng',
            'email.unique'=>':attribute :email đã tồn tại',
            'avatar'=>':attribute :hình ảnh upload lên phải là hình ảnh',
            'mimes'=>':attribute :hình ảnh upload lên phải định dạng như sau:jpeg,png,jpg,gif',
            'avatar.max'=>':attribute :hình ảnh upload lên vượt quá kích thước cho phép :max'
        ];
    }
}
