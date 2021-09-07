<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;

    protected $table = 'size';
    protected $fillable = [
        'name',
        'code',
        'description',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * Get the sizeType of the current Size
     */
    public function size_type(){
        return $this->belongsTo(SizeType::class);
    }

    public $timestamps = true;
}
