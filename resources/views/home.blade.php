<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Sidiney Store</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" />
    <link href="css/system.css" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
<div class="overlay"></div>
<div class="bg">
    <div class="container">
        <div class="box-logo">
            <h4 class="txt-logo">Sidiney Store</h4>
        </div>

        <div class="row">
            <div class="col s12 m6 l4">
                <a class="waves-effect waves-light btn-large" id="btCliente"><i class="material-icons left">people</i>Clientes</a>
            </div>
            <div class="col s12 m6 l4">
                <a class="waves-effect waves-light btn-large" id="btMaiorcompra"><i class="material-icons left">attach_money</i>Maior Compra</a>
            </div>
            <div class="col s12 m6 l4">
                <a class="waves-effect waves-light btn-large" id="btComprasrealizadas"><i class="material-icons left">shopping_basket</i>Compras Realizadas</a>
            </div>
            <div class="col s12 m6 l4">
                <a class="waves-effect waves-light btn-large" id="btSugestao"><i class="material-icons left">favorite</i>Sugestão Compra</a>
            </div>
            <div class="col s12 m6 l4">
                <a class="waves-effect waves-light btn-large" id="sair"><i class="material-icons left">close</i>Sair</a>
            </div>
        </div>
    </div>
</div>

<div class="box-modal" id="modal-cliente">
    <div class="box-back">
        <a href="javascript:void();" class="voltar"><i class="material-icons left">keyboard_arrow_left</i> VOLTAR</a>
    </div>
    <div class="box-topo">
        <div class="box-functions">
            <div class="row">
                <div class="col s12"><i class="material-icons left">people</i><h4>Cliente</h4></div>
            </div>
        </div>
    </div>
    <div class="box-miolo">
        <table>
            <thead>
            <tr>
                <th>NOME</th>
                <th>CPF</th>
                <th>VALOR EM COMPRAS</th>
            </tr>
            </thead>
            <tbody id="tableCliente"></tbody>
        </table>
    </div>
</div>

<div class="box-modal" id="modal-maiorcompra">
    <div class="box-back">
        <a href="javascript:void();" class="voltar"><i class="material-icons left">keyboard_arrow_left</i> VOLTAR</a>
    </div>
    <div class="box-topo">
        <div class="box-functions">
            <div class="row">
                <div class="col s12"><i class="material-icons left">attach_money</i><h4>Maior Compra</h4></div>
            </div>
        </div>
    </div>
    <div class="box-miolo">
        <table>
            <thead>
            <tr>
                <th>NOME</th>
                <th>CPF</th>
                <th>VALOR TOTAL</th>
            </tr>
            </thead>
            <tbody id="tableMaiorCompra"></tbody>
        </table>
    </div>
</div>

<div class="box-modal" id="modal-comprasrealizadas">
    <div class="box-back">
        <a href="javascript:void();" class="voltar"><i class="material-icons left">keyboard_arrow_left</i> VOLTAR</a>
    </div>
    <div class="box-topo">
        <div class="box-functions">
            <div class="row">
                <div class="col s12"><i class="material-icons left">attach_money</i><h4>Compras Realizadas</h4></div>
            </div>
        </div>
    </div>
    <div class="box-miolo">
        <table>
            <thead>
            <tr>
                <th>NOME</th>
                <th>CPF</th>
                <th>NÚMERO DE COMPRAS</th>
            </tr>
            </thead>
            <tbody id="tableComprasRealizadas"></tbody>
        </table>
    </div>
</div>

<div class="box-modal" id="modal-sugestao">
    <div class="box-back">
        <a href="javascript:void();" class="voltar"><i class="material-icons left">keyboard_arrow_left</i> VOLTAR</a>
    </div>
    <div class="box-topo">
        <div class="box-functions">
            <div class="row">
                <div class="col s12"><i class="material-icons left">favorite</i><h4>Sugestão de Compra</h4></div>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <select id="clienteSugestao">
                    <option value="" disabled selected>Escolha o cliente aqui</option>
                </select>
                <label>Cliente</label>
            </div>
        </div>
    </div>
    <div class="box-miolo">
        <table>
            <thead>
            <tr>
                <th>IDPRODUTO</th>
                <th>PRODUTO</th>
            </tr>
            </thead>
            <tbody id="tableSugestao"></tbody>
        </table>
    </div>
</div>

<input id="urlBase" type="hidden" value="{{url('')}}" />

<!-- Scripts Javascript-->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="{{url('js/functios.js')}}" type="text/javascript"></script>
<script src="{{url('js/listaClientes.js')}}" type="text/javascript"></script>
<script src="{{url('js/maiorCompra.js')}}" type="text/javascript"></script>
<script src="{{url('js/comprasRealizadas.js')}}" type="text/javascript"></script>
<script src="{{url('js/sugestao.js')}}" type="text/javascript"></script>
</body>
</html>

