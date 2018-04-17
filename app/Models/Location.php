<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Location extends Model
{
    use SoftDeletes;
    protected $table = 'location';
    protected $dates = ['deleted_at'];

    public $fillable = [
        'name',
    ];
}
