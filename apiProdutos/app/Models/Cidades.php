<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cidades extends Model
{
    public $timestamps = false;

    protected $table = 'cidades';


    protected $fillable = [
        'id',
        'cidade'
    ];

    public function cidade_id()
    {
        return $this->belongsTo(Produto::class, 'cidade', 'id');
    }
};





