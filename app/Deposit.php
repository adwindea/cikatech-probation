<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Deposit extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'rekening_id',
        'rekening_asal',
        'amount',
        'note',
    ];

    public function rekening(){
        return $this->belongsTo(Rekening::class);
    }

}
