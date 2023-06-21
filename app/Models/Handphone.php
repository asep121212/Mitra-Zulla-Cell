<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Handphone extends Model
{
    use HasFactory;
    protected $table = 'handphones';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'quantity',
        'description',
        'category_id',
        'price',
        'status',
        'thumbnail',
        'banner',
        'raw',
    ];
}
