<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class ClienteModel extends Model{
    /**
     * Nome da tabela
     * @var string
     */
    protected $table = 'cliente';

    /**
     * Colunas da tabela
     * @var array
     */
    protected $fillable = ['cpf','nome'];

    /**
     * Chave primária da tabela
     * @var string
     */
    protected $primaryKey= 'idcliente';

    /**
     * Definir para que não seja incluida as tabelas de data de criação e atualização
     * @var bool
     */
    protected $timestamp= true;

    /**
     * Campos que devem ser ocultados indendentemente da chamada
     * @var array
     */
    protected $hidden= [];
}
