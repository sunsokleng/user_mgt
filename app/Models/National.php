<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class National extends Model
{
    use SoftDeletes;

    protected $table = 'national';
    protected $dates = ['deleted_at'];

    public $fillable = [
        'name',
        'description',
    ];
}
