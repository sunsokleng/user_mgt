<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OfficeName extends Model
{
    use SoftDeletes;
    public $table = 'officename';
    protected $dates = ['deleted_at'];

    public $fillable = [
        'name',
        'description',
    ];
}
