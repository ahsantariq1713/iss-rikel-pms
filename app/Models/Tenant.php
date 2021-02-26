<?php

namespace App\Models;

use App\Helpers\StringConvertor;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function getimageTextAttribute()
    {
        return StringConvertor::Abbrv($this->name);
    }

    public function getFullAddressAttribute()
    {
        return trim($this->address . ' ' . $this->city . ' ' . $this->state . ' ' . $this->country . ' ' . $this->zipcode);
    }
}
