<?php

namespace App\Models;

use App\Helpers\StringConvertor;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $casts = ['created_at' => 'datetime', 'updated_at' => 'datetime', 'start_date' => 'date:Y-m-d'];

    public function getDeveloperNameAttribute()
    {
        return $this->developer ? $this->developer->name : 'NA';
    }

    public function getCurrentPhaseAttribute()
    {
        return $this->phases->sortBy('id')->where('completed_at', null)->first();
    }

    public function getCurrentPhaseNameAttribute()
    {
        $current = $this->currentPhase;
        return $current ? $current->name : 'NA';
    }


    public function processStatus()
    {
        $this->status = $this->currentPhase ? 'Processing' : 'Completed';
        $this->save();
    }

    public function getimageTextAttribute()
    {
        return StringConvertor::Abbrv($this->name);
    }



    public function developer()
    {
        return $this->belongsTo(Developer::class);
    }

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public function phases()
    {
        return $this->hasMany(ProjectPhase::class);
    }

    public function tenants()
    {
        return $this->hasMany(Tenant::class);
    }

    public function propertyFeature()
    {
        return $this->hasOne(PropertyFeature::class);
    }

    public function budget(){
        return $this->hasOne(Budget::class);
    }

    public function invoices(){
        return $this->hasMany(Invoice::class);
    }

    public function team(){
        return $this->belongsToMany(User::class,  'project_member');
    }
}
