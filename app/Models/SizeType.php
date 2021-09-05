<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SizeType extends Model
{
    use HasFactory;
    protected $table = 'size_type';
    protected $fillable = [
        'name',
        'description'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     * Get the sizes of the current sizeType
     */
    public function sizes(){
        return $this->hasMany(Size::class);
    }

    public $timestamps = true;
}
