<?php

namespace App\Models;

use App\Helpers\StringConvertor;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Developer extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $casts = ['created_at' => 'datetime', 'updated_at' => 'datetime'];

    public function getimageTextAttribute()
    {
        return StringConvertor::Abbrv($this->name);
    }

    public function getFullAddressAttribute(){
        return trim($this->address . ' ' . $this->city . ' ' . $this->state . ' ' . $this->country);
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
