<?php

namespace App\Http\Requests;

use App\Models\Dqc84;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class Dqc84FormRequest
 * @package App\Http\Requests
 * @property integer id
 * @property integer model
 * @property string fat_part_no
 * @property integer total_location
 */
class Dqc84FormRequest extends FormRequest
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
        $table = (new Dqc84())->getTable();

        return [
            'model' => 'required|integer|min:1',
            'fat_part_no' => 'required|max:15|unique:'.$table.',fat_part_no,'.$this->id.',id',
            'total_location' => 'required|integer|min:1',
        ];
    }

    public function messages(): array
    {
        return [
            'model.required' => '- Informe o MODEL.',
            'model.integer'  => '- MODEL Inválido.',
            'model.min'      => '- Informe o MODEL.',

            'fat_part_no.required' => '- Informe o FAT_PART_NO .',
            'fat_part_no.max'      => '- FAT_PART_NO tem que ter no máximo 15 caracteres.',
            'fat_part_no.unique'   => '- FAT_PART_NO já existe no sistema.',

            'total_location.required' => '- Informe o TOTAL_LOCATION.',
            'total_location.integer'  => '- TOTAL_LOCATION Inválido.',
            'total_location.min'      => '- Informe o TOTAL_LOCATION.'
        ];
    }
}
