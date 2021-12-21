<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{

    public $timestamps = false;

    protected $table = 'produtos';


    protected $fillable = [
        'id',
        'codProduto',
        'nomeProduto',
        'valorProduto',
        'estoque',
        'cidade_id'
    ];

    public function cidade()
    {
        return $this->hasOne(Cidades::class, 'id', 'cidade_id');
    }



}
