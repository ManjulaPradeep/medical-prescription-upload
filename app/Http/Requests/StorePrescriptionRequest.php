<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StorePrescriptionRequest extends FormRequest
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
            'delivery_time' => 'required|time',
            'Address' => 'required|string|max:512',
            'note' => 'string|max:1024',
            'img1' => 'image|max:3048',
            'img2' => 'image|max:3048',
            'img3' => 'image|max:3048',
            'img4' => 'image|max:3048',
            'img5' => 'image|max:3048',
        ];
    }

    public function messages(): array
    {
        return [
            'delivery_time.required' => 'The delivery time is required.',
            'delivery_time.time' => 'The delivery time must be a time format.',

            'Address.required' => 'The Address is required.',
            'Address.string' => 'The Address must be a string.',
            'Address.max' => 'The Address field cannot be more than 512 characters.',

            'note.string' => 'The note field must be a string.',
            'note.max' => 'The note field cannot be more than 1024 characters.',

            'img1.image' => 'The image1 field must be a image(JPG, PNG).',
            'img1.max' => 'The image1 field cannot be more than 3mb.',

            'img2.image' => 'The image2 field must be a image(JPG, PNG).',
            'img2.max' => 'The image2 field cannot be more than 3mb.',

            'img3.image' => 'The image3 field must be a image(JPG, PNG).',
            'img3.max' => 'The image3 field cannot be more than 3mb.',

            'img4.image' => 'The image4 field must be a image(JPG, PNG).',
            'img4.max' => 'The image4 field cannot be more than 3mb.',

            'img5.image' => 'The image5 field must be a image(JPG, PNG).',
            'img5.max' => 'The image5 field cannot be more than 3mb.',

        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = $validator->errors();
    
        throw new HttpResponseException(response()->json([
            'message' => 'Validation failed',
            'errors' => $errors,
        ], 422));
    }
}
