<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DqcModel
 * @package App\Models
 * @property integer id
 * @property string model
 */
class DqcModel extends Model
{
    use HasFactory;

    protected $table = 'dqc_model';

    public $timestamps = false;
}
