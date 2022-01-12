<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class menu_makanan_model extends Model
{
    use HasFactory;

    protected $table ="menu_makanan";
    protected $guarded = [];

    public function transaksi(){
        return $this->hasMany(transaksi_model::class);
    }
}
