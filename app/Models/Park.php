<?php

namespace App\Models;

use Carbon\Carbon;
use App\Traits\Uuid;
use App\Models\Vehycle;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Park extends Model
{
    use HasFactory, Uuid;

    public $incrementing = false;
    
    protected $keyType = 'string';

    protected $guarded = [];

    protected $appends = ['date'];

    public function vehycles()
    {
        return $this->hasMany(Vehycle::class, 'id', 'vehycle_id');
    }

    protected function getDateAttribute($value)
    {
        return Carbon::parse($this->time_in)->format('D, d M Y');
    }

}
