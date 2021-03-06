<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuery extends FormRequest
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
            'query' => 'required|max:255',
            'time' => 'nullable|numeric',
            'lock_time' => 'nullable|numeric',
            'query_time' => 'nullable|numeric',
            'rows_sent' => 'nullable|numeric',
            'rows_examined' => 'nullable|numeric',
            'host' => 'nullable|string',
        ];
    }
}