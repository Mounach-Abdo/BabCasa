<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;

use App;
use App\Language;

class Reason extends Model
{
    use SoftDeletes;
    use LogsActivity;

    protected $fillable = [];

    protected static $recordEvents = ['deleted', 'created', 'updated'];

    protected static $logFillable = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        return "This model has been ". $eventName;
    }

    function reasonLangs()
    {
        return $this->hasMany('App\ReasonLang');
    }
    public function reasonLang()
    {
        $langId = Language::where('alpha_2_code',App::getLocale())->first()->id; 
        $reason = self::reasonLangs()->where('lang_id',$langId)->first();

        return !isset($reason->reference)||$reason->reference=='' ? self::reasonLangs()->where('reference','!=','')->first() : $reason;

    }
    public function statuses()
    {
        return $this->belongsToMany('App\Status')->withTimestamps();
    }
}
