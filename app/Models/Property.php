<?php

namespace App\Models;

use App\Helpers\StringConvertor;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $casts = ['demolition_date' => 'date:Y-m-d','build_date' => 'date:Y-m-d', 'created_date' => 'datetime', 'updated_date' => 'datetime'];

    public function getFullAddressAttribute(){
        return trim($this->address . ' ' . $this->city . ' ' . $this->state . ' ' . $this->country);
    }

    public function getFundingSourcesAttribute(){
        return explode(',' , $this->funding_source);
    }

    public function getimageTextAttribute()
    {
        return StringConvertor::Abbrv($this->name);
    }


    public function projects(){
        return $this->hasMany(Project::class);
    }

}
