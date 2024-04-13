<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class CreatePostRequest extends FormRequest
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
            'title' => ['required', 'min:8', 'max:64' ,'string'],
            'description' => ['string', 'required', 'min:16'],
            'content' => ['required', 'min:50'],
            'cover' => ['image', 'max:4000'],
            'slug' => ['required', 'regex:/^[a-z0-9\-]+$/i']
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'slug' => $this->input('slug')?:Str::slug($this->input('title'))
        ]);
    }
}
