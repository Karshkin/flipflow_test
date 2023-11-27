<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = self::TABLE;
    
    public $timestamps = false;

    const TABLE = 'products';

    const TITLE = 'title';
    const PRICE = 'price';
    const IMG = 'img';
    const LINK = 'link';

    const UNIQUE_KEYS = [
        self::TITLE
    ];

    const UPDATE_COLUMNS = [
        self::PRICE,
        self::IMG,
        self::LINK,
    ];
}
