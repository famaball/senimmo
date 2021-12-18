<?php

namespace App\Http\Requests\Admin\Agence;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateAgence extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.agence.edit', $this->agence);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'nom' => ['sometimes', 'string'],
            'adresse' => ['sometimes', 'string'],
            'telephone' => ['sometimes', 'string'],
            'email' => ['sometimes', 'email', Rule::unique('agence', 'email')->ignore($this->agence->getKey(), $this->agence->getKeyName()), 'string'],
            'email_verified_at' => ['nullable', 'date'],
            
        ];
    }

    /**
     * Modify input data
     *
     * @return array
     */
    public function getSanitized(): array
    {
        $sanitized = $this->validated();


        //Add your code for manipulation with request data here

        return $sanitized;
    }
}
