<?php

namespace App\Http\Controllers;
use App\Model\ClienteModel;
use App\Model\CompraModel;
use App\Model\ParametrosModel;
use Illuminate\Http\Request;
use App\Http\Controllers\ImportacaoController;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller{
    private $importacao;

    public function __construct(){
        $paramImportacao= ParametrosModel::where('parametro','IMPORTACAO')->where('status','1');

        if($paramImportacao != null && $paramImportacao->first()->valor == 1) {
            $this->importacao = new ImportacaoController();
            $this->importacao->importacao();
        }
    }

    public function getClientes(){
        return response()->json(ClienteModel::All(),200);
    }

    public function getAnoCompra(){
        $anos= DB::table('compra')->select(DB::raw('YEAR(data) as ano'))->groupBy('ano')->orderBy('ano','asc');
        return response()->json($anos == null ? [] : $anos->get(),200);
    }

    public function listaClientes(){
        $clientes= DB::table('cliente')
                    ->select('cliente.cpf', 'cliente.nome', DB::raw('sum(compra.valor_total) as valorTotal'))
                    ->leftJoin('compra','compra.cpf','=','cliente.cpf')
                    ->groupBy('cliente.cpf')
                    ->orderBy('valorTotal','asc');

        $clientes= $clientes != null ? $clientes->get() : null;

        if(!empty($clientes[0])) {
            $i = 0;
            foreach ($clientes as $c) {
                $clientes[$i]->valorTotal= $this->getFormatNumber($c->valorTotal, 2);
                $i++;
            }
        }

        return response()->json($clientes, 200);
    }

    public function maiorCompra(Request $request){
        $cliente= DB::table('cliente')
            ->select('cliente.cpf', 'cliente.nome', 'valor_total')
            ->leftJoin('compra','compra.cpf','=','cliente.cpf')
            ->where(DB::raw('YEAR(compra.data)'),$request->ano)
            ->orderBy('valor_total','desc')
            ->limit(1);

        if($cliente != null) {
            $cliente = $cliente->first();
            $cliente->valor_total= $this->getFormatNumber($cliente->valor_total,2);
        }

        return response()->json($cliente, 200);
    }

    public function listaClientesCompras(Request $request){
        $clientes= DB::table('cliente')
            ->select('cliente.cpf', 'cliente.nome', DB::raw('count(compra.idcompra) as nCompras'))
            ->leftJoin('compra','compra.cpf','=','cliente.cpf')
            ->where(DB::raw('YEAR(compra.data)'),$request->ano)
            ->groupBy('compra.cpf')
            ->having('nCompras','>=',2)
            ->orderBy('nCompras','desc');

        $clientes= $clientes != null ? $clientes->get() : null;
        return response()->json($clientes, 200);
    }

    public function sugestaoCompra(Request $request){
        $sugestao= DB::table('compra')
                    ->select('produto.idproduto','produto.nome as produto', DB::raw('count(compra_item.idproduto) as nProduto'))
                    ->leftJoin('compra_item','compra_item.idcompra','=','compra.idcompra')
                    ->leftJoin('produto','produto.idproduto','=','compra_item.idproduto')
                    ->where('compra.cpf',$request->cpf)
                    ->groupBy('compra_item.idproduto')
                    ->orderBy('nProduto','desc')
                    ->limit(1);

        $sugestao= $sugestao != null ? $sugestao->first() : null;
        return response()->json($sugestao, 200);
    }

    private function getFormatNumber($valor, $nDecimal = 2){
        return 'R$ '.number_format($valor, $nDecimal, ',', '.');
    }
}
