<?php
namespace App\Models;


use Illuminate\Database\Eloquent\Builder;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

// Illuminate\Database\Eloquent\Builder;


class ClintModel extends Model{

    use SoftDeletes;

      /**
       * table name
       * @var string
       */

    protected $table = 'clints';

    /**
     *  primary key
     * @var string
     */
    protected $primaryKey = 'clintsNumber';
    /**
     *  keytype of primary key
     * @var int
     */
    protected $keytype = 'int';
    

    public function scopeCountries(Builder $qry,$country)
    {
// function pluck($key)=>value of this key inside the array or object
        return $qry->where('country','=',$country)->get();
    }
    function scopelimit(Builder $qry ,$limit ){

        return $qry->where('ccreditLimit', '=', $limit)->get();
    }

    public function scopeCountCountries($qry,$country){
        return $qry->where('country', '=', $country)->count();
    }   
    
    public  function orders(){
        return $this->hasMany(Orders::class, 'clintsNumber');
    }

    public function sales(){
        return $this->belongsTo(Sales::class, 'Repforsales', 'salesNumber');
    }

    public function Orderdetails(){

        return $this->hasManyThrough(Orderdetails::class, Orders::class, 'clintsNumber', 'orderNumber');
    }

    public function Shippedorder(){

        return self::orders()->where('status', 'shipped');
    }


}
