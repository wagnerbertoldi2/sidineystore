<?php

namespace App\Http\Controllers;
use App\Model\CompraItemModel;
use App\Model\CompraModel;
use App\Model\ProdutoModel;
use App\Model\ProdutoTamanhoModel;
use App\Model\ProdutoMarcaModel;
use Illuminate\Http\Request;
use App\Model\ClienteModel;
use App\Model\ImportacaoModel;
use Illuminate\Support\Facades\DB;

class ImportacaoController extends Controller{
    private $clientes;
    private $hashCliente;
    private $hashImportacaoCliente;
    private $compras;
    private $hashCompras;
    private $hashImportacaoCompras;

    public function __construct() {
        $this->clientes= json_decode(file_get_contents(env('APP_BASE_CLIENTE')), true);
        $this->hashCliente= md5(file_get_contents(env('APP_BASE_CLIENTE')));
        $this->hashImportacaoCliente= ImportacaoModel::where('tipo','cliente')->orderBy('created_at','desc')->first();
        $this->hashImportacaoCliente= $this->hashImportacaoCliente != null ? $this->hashImportacaoCliente->hash : '';

        $this->compras= (json_decode(file_get_contents(env('APP_BASE_COMPRA')), true));
        $this->hashCompras= md5(file_get_contents(env('APP_BASE_COMPRA')));
        $this->hashImportacaoCompras= ImportacaoModel::where('tipo','compra')->orderBy('created_at','desc')->first();
        $this->hashImportacaoCompras= $this->hashImportacaoCompras != null ? $this->hashImportacaoCompras->hash : '';
    }

    public function importacao(){
        $status= 0;

        if($this->hashImportacaoCliente != $this->hashCliente) {
            $status= 1;
            $this->setClientes();

            $objImportacao= new ImportacaoModel();
            $objImportacao->hash= $this->hashCliente;
            $objImportacao->tipo= 'cliente';
            $objImportacao->save();
        }

        if($this->hashImportacaoCompras != $this->hashCompras){
            $status= 1;
            $this->setCompras();

            $objImportacao= new ImportacaoModel();
            $objImportacao->hash= $this->hashCompras;
            $objImportacao->tipo= 'compra';
            $objImportacao->save();
        }

        if($status == 1){
            return true;
        } else {
            return false;
        }
    }

    private function setClientes(){
        ClienteModel::truncate();

        foreach ($this->clientes as $c) {
            $objModel = new ClienteModel();
            $objModel->cpf = $c['cpf'];
            $objModel->nome = $c['nome'];
            $objModel->save();
        }

        return true;
    }

    private function setCompras(){
        $this->deleteCompra();

        foreach ($this->compras as $c){
            $i=0;
            foreach ($c['itens'] as $item){
                $idMarca= $this->verificaMarca($item['marca']);
                if($idMarca == false){
                    $idMarca= $this->setMarca($item['marca']);
                }

                $idTamanho= $this->verificaTamanho($item['tamanho']);
                if($idTamanho == false){
                    $idTamanho= $this->setTamanho($item['tamanho']);
                }

                $idProduto[$i]= $this->verificaProduto($item['produto'],$item['preco'],$idTamanho,$idMarca);
                if($idProduto[$i] == false){
                    $idProduto[$i]= $this->setProduto($item['produto'],$item['preco'],$idTamanho,$idMarca);
                }
                $i++;
            }

            $idCompra= $this->setCompra($c['codigo'],date('Y-m-d', strtotime($c['data'])),$c['valorTotal'],$c['cliente']);

            foreach ($idProduto as $idProd) {
                $this->setCompraItem($idCompra, $idProd);
            }
        }
    }

    private function setProduto($produto, $preco, $idTamanho, $idMarca){
        try {
            $obj = new ProdutoModel();
            $obj->nome = $produto;
            $obj->preco = $preco;
            $obj->idproduto_tamanho = $idTamanho;
            $obj->idproduto_marca = $idMarca;
            $obj->save();

            return $obj->idproduto;
        } catch (Exception $e){
            return $e->getMessage();
        }
    }

    private function verificaProduto($produto, $preco, $idTamanho, $idMarca){
        $prod= ProdutoModel::where('nome',$produto)
                            ->where('preco',$preco)
                            ->where('idproduto_tamanho',$idTamanho)
                            ->where('idproduto_marca',$idMarca)
                            ->first();

        return $prod == null ? false : $prod->idproduto;
    }

    private function setTamanho($tamanho){
        try {
            $obj = new ProdutoTamanhoModel();
            $obj->tamanho= $tamanho;
            $obj->save();

            return $obj->idproduto_tamanho;
        } catch (Exception $e){
            return $e->getMessage();
        }
    }

    private function verificaTamanho($tamanho){
        $prod= ProdutoTamanhoModel::where('tamanho',$tamanho)->first();
        return $prod == null ? false : $prod->idproduto_tamanho;
    }

    private function setMarca($marca){
        try {
            $obj = new ProdutoMarcaModel();
            $obj->marca= $marca;
            $obj->save();

            return $obj->idproduto_marca;
        } catch (Exception $e){
            return $e->getMessage();
        }
    }

    private function verificaMarca($marca){
        $prod= ProdutoMarcaModel::where('marca',$marca)->first();
        return $prod == null ? false : $prod->idproduto_marca;
    }

    private function setCompra($codigo, $data, $valor_total, $cpf){
        try {
            $obj = new CompraModel();
            $obj->codigo= $codigo;
            $obj->data= $data;
            $obj->valor_total= $valor_total;
            $obj->cpf= $cpf;
            $obj->save();

            return $obj->idcompra;
        } catch (Exception $e){
            return $e->getMessage();
        }
    }

    private function setCompraItem($idcompra, $idproduto){
        try {
            $obj = new CompraItemModel();
            $obj->idcompra= $idcompra;
            $obj->idproduto= $idproduto;
            $obj->save();

            return true;
        } catch (Exception $e){
            return $e->getMessage();
        }
    }

    private function deleteCompra(){
        CompraModel::where('idcompra','>',0)->delete();
        ProdutoModel::where('idproduto','>',0)->delete();
        ProdutoTamanhoModel::where('idproduto_tamanho','>=',1)->delete();
        ProdutoMarcaModel::where('idproduto_marca','>=',1)->delete();
        CompraItemModel::truncate();
        return true;
    }
}
