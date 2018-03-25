<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NationalUser extends Model
{
    use SoftDeletes;

    protected $table = 'nationaluser';
    protected $dates = ['deleted_at'];

    public $fillable = [
        'national_id',
        'englishname',
        'khmername',
        'username',
        'aliasname',
        'position_id',
        'officename_id',
        'telephone',
        'modules',
        'date_firstupdate',
        'date_secondupdate',
        'comments',
        'image',
        'active'
    ];

    public function national(){
        return $this->belongsTo('App\Models\National');
    }

    public function userModuleRoles(){
        return $this->hasMany('App\Models\NationalUserModuleRoles','nationaluser_id');

    }
}

