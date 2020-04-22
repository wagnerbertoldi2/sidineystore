<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class ProdutoTamanhoModel extends Model{
    /**
     * Nome da tabela
     * @var string
     */
    protected $table = 'produto_tamanho';

    /**
     * Colunas da tabela
     * @var array
     */
    protected $fillable = ['tamanho'];

    /**
     * Chave primária da tabela
     * @var string
     */
    protected $primaryKey= 'idproduto_tamanho';

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
