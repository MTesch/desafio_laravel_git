<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Demanda extends Model
{
    protected $fillable = [
	'descricao', 'endereco', 'contato', 'anunciante', 'status'
    ];
}
