<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'ringkasan', 'harga', 'stok', 'kategori_id', 'diskon', 'publish'
    ];
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
    public function warnas()
    {
        return $this->hasMany(WarnaProduk::class);
    }
}
