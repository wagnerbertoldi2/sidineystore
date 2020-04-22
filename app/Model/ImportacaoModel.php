<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class ImportacaoModel extends Model{
    /**
     * Nome da tabela
     * @var string
     */
    protected $table = 'importacao';

    /**
     * Colunas da tabela
     * @var array
     */
    protected $fillable = ['hash','tipo'];

    /**
     * Chave primária da tabela
     * @var string
     */
    protected $primaryKey= 'idimportacao';

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
