<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Employee extends Model
{
    use SoftDeletes;
    public $table = 'employee';
    protected $dates = ['deleted_at'];

    public $fillable = [
        'name',
        'sex',
        'position_id',
        'telephone',
        'email',
        'address'
    ];
}
