<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;

class CreateTrainingRequest extends ApiRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'subclient_id'  => 'required|exists:subclients,id',
            'center_id'     => 'required|exists:centers,id',
            'grid_id'       => 'required|exists:grids,id',
            'training_name' => 'required|string|max:255',
            'training_date' => 'required',
        ];
    }

}
