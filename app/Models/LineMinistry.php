<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LineMinistry extends Model
{
    use SoftDeletes;

    protected $table = 'lineministry';
    protected $dates = ['deleted_at'];

    public $fillable = [
        'name',
        'description',
    ];
}
