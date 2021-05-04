<?php

namespace App\Http\Requests;

use App\Models\Dqc841;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class Dqc841FormRequest
 * @package App\Http\Requests
 * @property integer id
 * @property integer fat_part_no
 * @property string parts_no
 * @property integer unt_usg
 * @property string description
 * @property string ref_designator
 */
class Dqc841FormRequest extends FormRequest
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
        return [
            'fat_part_no' => 'required|integer|min:1',
            'parts_no' => ['required', 'max:15', $this->validatePartsNo()],
            'unt_usg' => 'required|integer|min:1',
            'description' => 'required',
            'ref_designator' => 'nullable'
        ];
    }

    public function messages(): array
    {
        return [
            'fat_part_no.required' => '- Informe o FAT_PART_NO.',
            'fat_part_no.integer'  => '- FAT_PART_NO Inválido.',
            'fat_part_no.min'      => '- Informe o FAT_PART_NO.',

            'parts_no.required' => '- Informe o PARTS_NO .',
            'parts_no.max'      => '- PARTS_NO tem que ter no máximo 15 caracteres.',

            'unt_usg.required' => '- Informe o UNT_USG.',
            'unt_usg.integer'  => '- UNT_USG Inválido.',
            'unt_usg.min'      => '- Informe o UNT_USG.',

            'description.required' => '- Informe a DESCRIPTION.',
        ];
    }

    private function validatePartsNo(): \Closure
    {
        return function ($attribute, $value, $fail)
        {
            $query = Dqc841::query()->where('id', '!=', $this->id)
                                    ->where('fat_part_no', '=', $this->fat_part_no)
                                    ->where('parts_no', '=', $this->parts_no);

            if ($query->count() > 0) {
                $fail('- FAT_PART_NO e PARTS_NO já existe no sistema.');
            }
        };
    }
}
