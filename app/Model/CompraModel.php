<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class CompraModel extends Model{
    /**
     * Nome da tabela
     * @var string
     */
    protected $table = 'compra';

    /**
     * Colunas da tabela
     * @var array
     */
    protected $fillable = ['codigo','data','valor_total','cpf'];

    /**
     * Chave primária da tabela
     * @var string
     */
    protected $primaryKey= 'idcompra';

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

    public function Produto(){
        return $this->belongsToMany('App\Models\ProdutoModel','idcompra_item', 'idcompra','idproduto')
            ->withTimestamps();
    }
}
