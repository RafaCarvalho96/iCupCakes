<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $primaryKey = "id";

    public function lines(): HasMany
    {
        return $this->hasMany(OrderLine::class,'order_id','id');
    }

}
