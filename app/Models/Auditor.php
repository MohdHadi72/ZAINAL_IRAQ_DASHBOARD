<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auditor extends Model
{
    use HasFactory;
    protected $fillable = [
        'fname', 'mname', 'lname','address','phone','occupation','projectName','zone',
        'category','addOn','landSize','uiid','area','housePrice','totalPrice','downPayment','installment',
        'emi','fileCreation','idType','idNumber','issueDate','alternaticePhone','docs','houseNumber_id'
    ];
}
