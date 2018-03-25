<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes;
    public $table = 'role';
    protected $dates = ['deleted_at'];

    public $fillable = [
        'name',
        'description',
    ];
}
