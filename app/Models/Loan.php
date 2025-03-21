<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function member()
    {
        return $this->belongsTo(Member::class);

    }

    public function loanPayments()
    {
        return $this->hasMany(LoanPayment::class);
    }

    public function loanTerm(){
        return $this->belongsTo(LoanTerm::class);
    }
}
