<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    protected $table = 'dqc841';
}
