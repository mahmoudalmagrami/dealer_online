<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Store extends Model
{
    use HasFactory;
    protected $fillable = [
        'id', 'unit', 'unit_price', 'purchasing_price', 'production_date', 'expiry_date', 'quantity', 'remaining_quantity', 'product_id'
    ];
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

}
