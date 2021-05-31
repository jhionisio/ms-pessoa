<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PESSOAModel extends Model
{
    protected $table = 'table_pessoa';

    protected $fillable = [
        'id', 'required',
        'Telefone', 'required',
        'CPF', 'required',
        'Nome', 'required',
        'Email', 'required',
        'Acompanhantes', 'required'
    ];
}
