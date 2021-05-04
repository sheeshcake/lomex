<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class Products extends Model
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_name',
        'product_type',
        'product_ribbon',
        'product_description',
        'product_discount',
        'product_sale_price',
        'product_quantity_in_unit',
        'product_base_unit',
        'product_price',
        'brand_id',
        'category_id'
    ];
}
