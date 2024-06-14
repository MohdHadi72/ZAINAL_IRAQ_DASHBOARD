<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

  public function project()
    {
        return $this->belongsTo('App\Models\Project', 'projectName_id', 'id');
    } 
    
     public function getZone()
    {
        return $this->belongsTo('App\Models\AddZone', 'zone','id');
    }
    
     
 
    protected $fillable = [
        'projectName',
        'zone',
        'houseNumber',
        'category',
        'downPayment',
        'price',
        'landSize',
        'area',
        'totalAmount',
        'intrestRate',
        'monthTime',
        'totalPayment'
        
    ];
}
