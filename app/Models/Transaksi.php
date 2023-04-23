<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table    = 'transaksi';
    protected $guarded  = [];

    public function master_kardus()
    {
        return $this->belongsTo(MasterDataKardus::class, 'master_kardus_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}
