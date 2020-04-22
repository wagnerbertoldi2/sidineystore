$(document).ready(function(){
    var token= localStorage.getItem('token');
    var urlBase= $("#urlBase").val();

    $('#btCliente').click(function () {
        var htmlCliente;
        axios.get(urlBase+'/api/lista-clientes', {
            headers: {
                'Authorization': 'Bearer '+token
            }
        })
            .then(function (response) {
                $.map(response.data, function(item, key){
                    htmlCliente += "<tr><td>"+item.nome+"</td><td>"+item.cpf+"</td><td>"+item.valorTotal+"</td></tr>";
                });

                $("#tableCliente").html(htmlCliente);
            })
            .catch(function (error) {
                console.log(error);
            });

        $('#modal-cliente').show('slow');
    });
});
