<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class CompraItemModel extends Model{
    /**
     * Nome da tabela
     * @var string
     */
    protected $table = 'compra_item';

    /**
     * Colunas da tabela
     * @var array
     */
    protected $fillable = ['idcompra','idproduto'];

    /**
     * Chave primária da tabela
     * @var string
     */
    protected $primaryKey= 'idcompra_item';

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
