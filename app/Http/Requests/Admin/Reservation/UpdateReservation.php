<?php

namespace App\Http\Requests\Admin\Reservation;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateReservation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.reservation.edit', $this->reservation);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'date' => ['sometimes', 'date'],
            'etat' => ['sometimes', 'string'],
            'description' => ['sometimes', 'string'],
            'prenom' => ['sometimes', 'string'],
            'nom' => ['sometimes', 'string'],
            'telephone' => ['sometimes', 'string'],
            'email' => ['sometimes', 'email', Rule::unique('reservation', 'email')->ignore($this->reservation->getKey(), $this->reservation->getKeyName()), 'string'],
            'adresse' => ['sometimes', 'string'],
            
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
