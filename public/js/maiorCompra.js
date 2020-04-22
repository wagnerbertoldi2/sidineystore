$(document).ready(function(){
    var token= localStorage.getItem('token');
    var urlBase= $("#urlBase").val();

    $('#btMaiorcompra').click(function () {
        let data= '{"ano":2019}';

        axios.post(urlBase+'/api/cliente-maior-compra', data, {
            headers: {
                'Authorization': 'Bearer '+token,
                'Content-Type': 'application/json'
            }
        })
            .then(function (response) {
                $("#tableMaiorCompra").html("<tr><td>"+response.data.nome+"</td><td>"+response.data.cpf+"</td><td>"+response.data.valor_total+"</td></tr>");
            })
            .catch(function (error) {
                console.log(error);
            });

        $('#modal-maiorcompra').show('slow');
    });
});
