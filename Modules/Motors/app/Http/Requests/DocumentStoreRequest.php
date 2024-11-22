<?php

namespace Modules\Motors\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocumentStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'header' => 'required|file|mimes:txt',
            'body' => 'required|file|mimes:txt',
            'meta_title' => 'required|string|max:255',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
