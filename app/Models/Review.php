<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'id_product',
        'name',
        'email',
        'stars',
        'review'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'id_product');
    }
}
