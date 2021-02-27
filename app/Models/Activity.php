<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $casts = ['created_at' => 'datetime', 'updated_at' => 'datetime'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function entity(){
        return $this->belongsTo('App\Models\\' . $this->entity_class, 'entity_id');
    }

    public function affectedEntity(){
        return $this->belongsTo('App\Models\\' . $this->affected_entity_class, 'affected_entity_id');
    }

    public function toString()
    {
        if($this->affected_entity_id){
            return
            "@{$this->user->name} " .
            strtolower($this->operation) .
            " {$this->entity_class} # {$this->entity_id} to " .
            ($this->affected_entity_class == 'User' ? "@{$this->affectedEntity->name}" : " {$this->affected_entity_class}") ;
        }else{
            return "{$this->user->name}@({$this->user->id}) " .
            strtolower($this->operation) .
            " '{$this->entity_class}' # {$this->entity_id}";
        }
    }
}
