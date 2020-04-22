<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class ProdutoMarcaModel extends Model{
    /**
     * Nome da tabela
     * @var string
     */
    protected $table = 'produto_marca';

    /**
     * Colunas da tabela
     * @var array
     */
    protected $fillable = ['marca'];

    /**
     * Chave primária da tabela
     * @var string
     */
    protected $primaryKey= 'idproduto_marca';

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
