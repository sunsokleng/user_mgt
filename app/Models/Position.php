<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Position extends Model
{
    use SoftDeletes;
    public $table = 'position';
    protected $dates = ['deleted_at'];

    public $fillable = [
        'name',
        'description',
    ];
}
