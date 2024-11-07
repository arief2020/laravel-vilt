<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\TransactionDetail;
use App\Models\User;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'transaction_date',
        'transaction_type',
        'total',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function transactionDetail()
    {
        return $this->hasMany(TransactionDetail::class);
    }
}
