<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    /**
     * the table associate to the modal
     * @var string
     */
    protected $table = "product_image";

    protected $fillable = [
        'name',
        'image_url',
        'product_id',
    ];

    public $timestamps = true;
}
