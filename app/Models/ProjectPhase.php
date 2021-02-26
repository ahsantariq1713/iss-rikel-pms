<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectPhase extends Model
{
    use HasFactory;
    protected $casts = ['completed_at' => 'date:Y-m-d', 'created_date' => 'datetime', 'updated_date' => 'datetime'];

    public function project(){
        return $this->belongsTo(Project::class);
    }
}
