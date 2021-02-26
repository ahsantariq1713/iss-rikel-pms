<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FundingSource extends Model
{
    use HasFactory;

    public static function tryInsertNew($sources, $exisitingResources){

        $newSources =  array_diff($sources,$exisitingResources->toArray());

        $data = [];
        foreach ($newSources as $newSource){
            $data [] = ['name' => $newSource];
        }

        FundingSource::insert($data);
    }
}
