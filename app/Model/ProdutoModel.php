<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class ProdutoModel extends Model{
    /**
     * Nome da tabela
     * @var string
     */
    protected $table = 'produto';

    /**
     * Colunas da tabela
     * @var array
     */
    protected $fillable = ['nome','preco'];

    /**
     * Chave primária da tabela
     * @var string
     */
    protected $primaryKey= 'idproduto';

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

    public function compra(){
        return $this->belongsToMany('App\Models\CompraModel','idcompra_item', 'idproduto', 'idcompra')
            ->withTimestamps();
    }

    public function produtoMarca(){
        return $this->belongsTo('App\Models\ProdutoMarca','idproduto_marca','idproduto_marca');
    }

    public function produtoTamanho(){
        return $this->belongsTo('App\Models\ProdutoTamanho','idproduto_tamanho','idproduto_tamanho');
    }
}
