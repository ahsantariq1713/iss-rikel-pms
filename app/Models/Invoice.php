<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $casts = ['created_at' => 'datetime', 'updated_at' => 'datetime', 'due_date' => 'date:Y-m-d', 'paid_date' => 'date:Y-m-d'];

    protected $guarded = ['id'];

    public function getTotalWagesAmountAttribute(){
        $sum = 0;
        foreach ($this->invoiceItems as $item) {
            $sum += $item->wageAmount;
        }
        return $sum;
    }

    public function getTotalLodgingExpenseAttribute(){
        if($this->invoiceItems == null) return 0;
        return (int)$this->invoiceItems->sum('lodging_expense');
    }

    public function getTotalMilageExpenseAttribute(){
        if($this->invoiceItems == null) return 0;
        return (int)$this->invoiceItems->sum('milage_expense');
    }

    public function getGrandTotalAttribute(){
        return $this->totalWagesAmount + $this->totalLodgingExpense + $this->totalMilageExpense;
    }

    public function project(){
        return $this->belongsTo(Project::class);
    }

    public function invoiceItems(){
        return $this->hasMany(InvoiceItem::class);
    }
}
