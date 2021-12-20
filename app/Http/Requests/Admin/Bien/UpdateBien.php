<?php

namespace App\Http\Requests\Admin\Bien;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateBien extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.bien.edit', $this->bien);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'libelle' => ['sometimes', 'string'],
            'adresse' => ['sometimes', 'string'],
            'prix' => ['sometimes', 'string'],
            'type' => ['sometimes', 'string'],
            'surface' => ['sometimes', 'string'],
            'description' => ['sometimes', 'string'],
            'image' => ['sometimes', 'string'],
            'id_user' => ['sometimes', 'integer'],
            'id_agence' => ['sometimes', 'integer'],
            'id_typebien' => ['sometimes', 'integer'],
            'id_statut_bien' => ['sometimes', 'integer'],
            'id_etat_bien' => ['sometimes', 'integer'],
            'id_localite' => ['sometimes', 'integer'],
            
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
