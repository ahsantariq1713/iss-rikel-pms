<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyFeature extends Model
{
    use HasFactory;
    protected $casts = ['renovation_date' => 'date:Y-m-d', 'created_date' => 'datetime', 'updated_date' => 'datetime'];
    public function getVacantUnitsAttribute(){
        return $this->units - $this->reserved_units;
    }

    public function project(){
        return $this->belongsTo(Project::class);
    }
}
