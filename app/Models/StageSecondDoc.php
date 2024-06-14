<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class StageSecondDoc extends Model
{
    use HasFactory,SoftDeletes;
    public function salesman(){
          return $this->belongsTo('App\Models\Salesman', 'houseNumber', 'id');
    }
     public function project()
    {
        return $this->belongsTo('App\Models\Product', 'product_id', 'id');
    }
}
