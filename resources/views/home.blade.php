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
                <a class="waves-effect waves-light btn-large"><i class="material-icons left">attach_money</i>Maior Compra</a>
            </div>
            <div class="col s12 m6 l4">
                <a class="waves-effect waves-light btn-large"><i class="material-icons left">shopping_basket</i>Compras Realizadas</a>
            </div>
            <div class="col s12 m6 l4">
                <a class="waves-effect waves-light btn-large"><i class="material-icons left">favorite</i>Sugestão Compra</a>
            </div>
            <div class="col s12 m6 l4">
                <a class="waves-effect waves-light btn-large"><i class="material-icons left">close</i>Sair</a>
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
                <div class="col s6"><i class="material-icons left">people</i><h4>Cliente</h4></div>
                <div class="col s6"></div>
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
            <tbody></tbody>
        </table>
    </div>
</div>

<!-- Scripts Javascript-->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.1/jquery.min.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
<script src="{{url('js/functios.js')}}" type="text/javascript"></script>
</body>
</html>
