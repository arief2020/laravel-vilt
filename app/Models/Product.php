<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category_id',
        'stock',
        'price',
        'image',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function transactionDetail()
    {
        return $this->hasMany(TransactionDetail::class);
    }
}
