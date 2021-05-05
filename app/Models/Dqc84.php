<?php

namespace App\Models;

use App\Traits\SerializeDate;
use Fico7489\Laravel\EloquentJoin\Traits\EloquentJoin;
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
    use EloquentJoin;
    use SerializeDate;

    protected $table = 'dqc84';

    protected $casts = [
        'created_at' => 'date:d/m/Y H:i:s',
        'updated_at' => 'date:d/m/Y H:i:s',
    ];

    public function dqcModel(): BelongsTo
    {
        return $this->belongsTo(DqcModel::class, 'model');
    }
}
