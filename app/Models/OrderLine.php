<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class OrderLine extends Model
{
    use HasFactory;

    protected $primaryKey = "id";

    protected $fillable = [
        'line_nbr',
        'product_id',
        'qty',
        'unit_price',
    ];

    public function product(): HasOne
    {
        return $this->hasOne(Product::class,'id','product_id');
    }



}
