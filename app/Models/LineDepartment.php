<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LineDepartment extends Model
{
    use SoftDeletes;

    protected $table = 'linedepartment';
    protected $dates = ['deleted_at'];

    public $fillable = [
        'name',
        'description',
    ];
}
