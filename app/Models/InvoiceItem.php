<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceItem extends Model
{
    use HasFactory;

    protected $casts = ['created_at' => 'datetime', 'updated_at' => 'datetime', 'start_date' => 'date:Y-m-d', 'end_date' => 'date:Y-m-d'];

    protected $guarded = ['id'];

    public function getWageAmountAttribute(){
        return (int)$this->total_hours * (int)$this->hourly_wage;
    }

    public function getTotalAmountAttribute(){
        return $this->wageAmount + (int)$this->lodging_expense + (int)$this->milage_expense;
    }

    public function invoice(){
        return $this->belongsTo(Invoice::class);
    }

}
