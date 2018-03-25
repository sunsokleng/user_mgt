<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NationalUserModuleRoles extends Model
{
    use SoftDeletes;

    public $table = 'nationaluser_module_roles';
    protected $dates = ['deleted_at'];

    public $fillable = [
        'nationaluser_id',
        'module_id',
        'role_id'
    ];
}
