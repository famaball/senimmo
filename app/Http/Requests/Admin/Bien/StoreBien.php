<?php

namespace App\Http\Requests\Admin\Bien;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreBien extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.bien.create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'libelle' => ['required', 'string'],
            'adresse' => ['required', 'string'],
            'prix' => ['required', 'string'],
            'surface' => ['required', 'string'],
            'description' => ['required', 'string'],
            'image' => ['required', 'string'],
            'id_user' => ['required', 'integer'],
            'id_agence' => ['required', 'integer'],
            'id_typebien' => ['required', 'integer'],
            'id_statut_bien' => ['required', 'integer'],
            'id_etat_bien' => ['required', 'integer'],
            'id_localite' => ['required', 'integer'],
            
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
