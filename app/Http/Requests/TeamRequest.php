<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeamRequest extends FormRequest
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
        $imageValid = '';
        if ($this->isMethod('POST') || $this->isMethod('PUT') && empty($this->old_img)) {
            $imageValid = 'required|image';
        }

        return [
            'name' => 'required|max:50',
            'role' => 'required|max:20',
            'photo' => $imageValid,
        ];
    }
}
