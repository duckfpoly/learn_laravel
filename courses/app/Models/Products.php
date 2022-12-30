<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_product',
        'image_product',
        'price_product',
        'desc_sort_product',
        'desc_product',
        'status',
        'id_category',
    ];
    public function getMoneyFormatAttribute()
    {
        return number_format($this->price_product, 0, '', ',')." VNĐ";
    }
}
