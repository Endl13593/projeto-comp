<?php

namespace App\Http\Requests;

use App\Models\DqcModel;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class DqcModelFormRequest
 * @package App\Http\Requests
 * @property integer id
 * @property string model
 */
class DqcModelFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        $table = (new DqcModel())->getTable();

        return [
            'model' => 'required|max:10|unique:'.$table.',model,'.$this->id.',id',
        ];
    }

    public function messages(): array
    {
        return [
            'model.required' => '- Informe o MODEL.',
            'model.max'      => '- MODEL tem que ter no máximo 10 caracteres.',
            'model.unique'   => '- MODEL já existe no sistema.'
        ];
    }
}
