<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class ParametrosModel extends Model{
    /**
     * Nome da tabela
     * @var string
     */
    protected $table = 'parametros';

    /**
     * Colunas da tabela
     * @var array
     */
    protected $fillable = ['parametro','valor','status','timestamp'];

    /**
     * Chave primária da tabela
     * @var string
     */
    protected $primaryKey= 'idparametros';

    /**
     * Definir para que não seja incluida as tabelas de data de criação e atualização
     * @var bool
     */
    protected $timestamp= false;

    /**
     * Campos que devem ser ocultados indendentemente da chamada
     * @var array
     */
    protected $hidden= [];
}
