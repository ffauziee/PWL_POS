<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class KategoriModel extends Model
{
    public function barang(): HasMany{
        return $this->hasMany(BarangModel::class, 'barang_id', 'barang_id');
    }
}
