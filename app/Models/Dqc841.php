<?php

namespace App\Models;

use App\Traits\SerializeDate;
use Fico7489\Laravel\EloquentJoin\Traits\EloquentJoin;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Dqc841
 * @package App\Models
 * @property integer id
 * @property integer fat_part_no
 * @property string parts_no
 * @property integer unt_usg
 * @property string description
 * @property string ref_designator
 * @property string created_at
 * @property string updated_at
 */
class Dqc841 extends Model
{
    use HasFactory;
    use EloquentJoin;
    use SerializeDate;

    protected $table = 'dqc841';

    protected $casts = [
        'created_at' => 'date:d/m/Y H:i:s',
        'updated_at' => 'date:d/m/Y H:i:s',
    ];

    public function dqc84(): BelongsTo
    {
        return $this->belongsTo(Dqc84::class, 'fat_part_no');
    }
}
