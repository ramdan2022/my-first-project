<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class sales extends Model{

    protected $primaryKey = 'salesNumber';


    public function scopeSalesTeam(Builder $qry){

        return $qry->whereIn('JobTitle',['Sales Manager (NA)','Sales Rep']);
    }

    public function clints(){

        return $this->hasMany(ClintModel::class, 'Repforsales', 'salesNumber');
    }



}