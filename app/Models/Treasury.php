<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Treasury extends Model
{
    use SoftDeletes;

    protected $table = 'treasury';
    protected $dates = ['deleted_at'];

    public $fillable = [
        'name',
        'description',
    ];
}
