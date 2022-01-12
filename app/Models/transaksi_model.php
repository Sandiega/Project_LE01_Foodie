<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi_model extends Model
{
    use HasFactory;

    protected $table ="transaksi";
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function makanan(){
        return $this->belongsTo(menu_makanan_model::class);
    }
}
