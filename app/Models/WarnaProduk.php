<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WarnaProduk extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'produk_id',
    ];
    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
}
