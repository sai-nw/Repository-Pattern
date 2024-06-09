<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
class AddUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|confirmed'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $error_text="";
        foreach ($validator->errors()->all() as $error) {
            $error_text .= $error;
        }
        throw new HttpResponseException(response()->json([
            'result' => null,
            'statusCode' => config('httpstatus.badRequest'),
            'message' => $error_text,
        ], config('httpstatus.badRequest')));
    }
}
