<?php

namespace App;

use App;
use App\Language;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Permission extends Model
{
    public function permissionLangs()
    {
            return $this->hasMany('App\PermissionLang');
    }

    public function permissionLang()
    {
            $langId = Language::where('symbol',App::getLocale())->first()->id; 
            return $this->permissionLangs()->where('lang_id',$langId);
    }

    public function profiles()
    {
            return $this->belongsToMany('App\Profile');
    }

}
