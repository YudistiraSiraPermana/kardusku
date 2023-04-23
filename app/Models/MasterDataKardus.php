<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterDataKardus extends Model
{
    use HasFactory;
    protected $table    = 'master_kardus';
    protected $guarded  = [];

    public function master_kardus()
    {
        return $this->hasMany(Transaksi::class, 'master_kardus_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}
