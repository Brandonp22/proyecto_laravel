<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    public function client(){
        return $this->belongsTo(Client::class);
    } 

    protected $fillable = ['borrowedCapital'];

/*     public function loanInstallments(){
        return $this->hasMany(LoanInstallment::class);
    }  */

    use HasFactory;
}
