<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubLocation extends Model
{
    use SoftDeletes;
    protected $table = 'sublocation';
    protected $table = 'location_id';
    protected $dates = ['deleted_at'];

    public $fillable = [
        'name',
    ];
}
