<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MigrateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'module' => 'required|in:general,jobs,motors',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
