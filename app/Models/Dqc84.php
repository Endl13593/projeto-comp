<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Dqc84
 * @package App\Models
 * @property integer id
 * @property integer model
 * @property string fat_part_no
 * @property integer total_location
 * @property string created_at
 * @property string updated_at
 */
class Dqc84 extends Model
{
    use HasFactory;

    protected $table = 'dqc84';

    protected $casts = [
        'created_at' => 'date:d/m/Y H:m:i',
        'updated_at' => 'date:d/m/Y H:m:i',
    ];

    public function dqcModel(): BelongsTo
    {
        return $this->belongsTo(DqcModel::class, 'model');
    }
}
