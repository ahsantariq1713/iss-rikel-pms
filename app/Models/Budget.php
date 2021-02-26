<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    //relocations count
    public function getPrResidentsAttribute()
    {
        return $this->project->tenants->where('relocation_type', 'Permanent')->count();
    }

    public function getTrResidentsAttribute()
    {
        return $this->project->tenants->where('relocation_type', 'Temporary')->count();
    }

    public function getTotalResidentsAttribute(){
        return $this->prResidents + $this->trResidents;
    }

    //permanent relocations data
    public function getPrRentAttribute()
    {
        return $this->project->tenants->where('relocation_type', 'Permanent')->sum('rent');
    }

    public function getPrRentAverageAttribute()
    {

        return $this->prResidents <= 0 ? 0 : ($this->prRent + (int)$this->pr_utility) / $this->prResidents;
    }

    public function getPrRentAssistAttribute()
    {
        return ((int)$this->pr_comparable_rent - $this->prRentAverage) * $this->prResidents;
    }

    public function getPrRentAssistUnitAttribute()
    {
        return $this->prResidents <= 0 ? 0 :  $this->prRentAssist / $this->prResidents;
    }

    public function getPrTotalMovingExpenseAttribute()
    {
        return (int)$this->pr_moving_expense * $this->prResidents;
    }

    public function getPrTotalExpenseAttribute(){
        return $this->prTotalMovingExpense + $this->prRentAssist;
    }

     //permanent relocations data
     public function getTrRentAttribute()
     {
         return $this->project->tenants->where('relocation_type', 'Temporary')->sum('rent');
     }

     public function getTrRentAverageAttribute()
     {

         return $this->trResidents <= 0 ? 0 : $this->trRent / $this->trResidents;
     }

     public function getTrOffRentAttribute()
     {
         return $this->trRentAverage *  (int)$this->tr_offsite;
     }

     public function getTrOffRentAverageAttribute()
     {

         return (int)$this->tr_offsite <= 0 ? 0 : ($this->trOffRent + (int)$this->tr_utility) / (int)$this->tr_offsite;
     }


     public function getTrOffRentAssistAttribute()
     {
         return ((int)$this->tr_comparable_rent - $this->trOffRentAverage) * (int)$this->tr_offsite;
     }

     public function getTrOffRentAssistUnitAttribute()
     {
         return (int)$this->tr_offsite <= 0 ? 0 : $this->trOffRentAssist / (int)$this->tr_offsite;
     }

     public function getTrOffTotalMovingExpenseAttribute()
     {
         return (int)$this->tr_off_moving_expense * (int)$this->tr_offsite;
     }

     public function getTrOffTotalExpenseAttribute(){
         return $this->trOffTotalMovingExpense + $this->trOffRentAssist;
     }

     public function getTrOnsiteAttribute(){
         return $this->trResidents - (int)$this->tr_offsite;
     }

     public function getTrOnTotalMovingExpenseAttribute()
     {
         return (int)$this->tr_on_moving_expense * $this->trOnsite;
     }

     public function getTrOnTotalExpenseAttribute(){
         return $this->trOnTotalMovingExpense;
     }

     //consultancy

     public function getPrTotalConsultancyAttribute(){
         return $this->prResidents * (int)$this->pr_consultancy;
     }


     public function getTrTotalConsultancyOffAttribute(){
        return (int)$this->tr_offsite * (int)$this->tr_consultancy_off;
    }

    public function getTrTotalConsultancyOnAttribute(){
        return $this->trOnsite * (int)$this->tr_consultancy_on;
    }

    public function getTotalConsultancyAttribute(){
        return $this->prTotalConsultancy + $this->trTotalConsultancyOff + $this->trTotalConsultancyOn ;
    }

    public function getGrandTotalAttribute(){
        return $this->prTotalExpense + $this->trOffTotalExpense + $this->trOnTotalExpense + $this->totalConsultancy;
    }


    public function getTrTotalExpenseAttribute(){
        return  $this->trOffTotalExpense + $this->trOnTotalExpense;
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
