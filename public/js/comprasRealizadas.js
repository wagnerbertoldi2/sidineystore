$(document).ready(function(){
    var token= localStorage.getItem('token');
    var urlBase= $("#urlBase").val();

    $('#btComprasrealizadas').click(function () {
        let html;
        let data= '{"ano":2018}';

        axios.post(urlBase+'/api/lista-clientes-ncompras', data, {
            headers: {
                'Authorization': 'Bearer '+token,
                'Content-Type': 'application/json'
            }
        })
            .then(function (response) {
                $.map(response.data, function(item, key){
                    html += "<tr><td>"+item.nome+"</td><td>"+item.cpf+"</td><td>"+item.nCompras+"</td></tr>";
                });

                $("#tableComprasRealizadas").html(html);
            })
            .catch(function (error) {
                console.log(error);
            });

        $('#modal-comprasrealizadas').show('slow');
    });
});
