<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        if(Auth::check()){
            return true;
        }
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
            'title'=>['required','string','min:2','max:80'],
            'author'=>['required','string','min:2','max:50'],
            'date'=>['required','date'],
            'status'=>['required','string','min:3'],
            'type_id'=>['required','numeric','integer','exists:types,id'],
            'description'=>['required','string','min:80'],
            'technologies'=>['array','exists:technologies,id']

        ];
    }
}
