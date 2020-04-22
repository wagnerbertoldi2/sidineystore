$(document).ready(function(){
    var token= localStorage.getItem('token');
    var urlBase= $("#urlBase").val();

    let htmlClients= '';
    axios.get(urlBase+'/api/clientes', {
        headers: {
            'Authorization': 'Bearer '+token,
            'Content-Type': 'application/json'
        }
    })
    .then(function (response) {
        $.map(response.data, function(item, key){
            htmlClients += "<option value='"+item.cpf+"'>"+item.nome+"</option>";
        });

        $("#clienteSugestao").append(htmlClients);
        $('select').formSelect();
    })
    .catch(function (error) {
        console.log(error);
    });

    $('#btSugestao').click(function () {
        $('#modal-sugestao').show('slow');
    });

    $("#clienteSugestao").change(function(){
        let data= '{"cpf":"'+$(this).val()+'"}';
        let htmlSugestao= '';

        axios.post(urlBase+'/api/sugestao-cliente', data, {
            headers: {
                'Authorization': 'Bearer '+token,
                'Content-Type': 'application/json'
            }
        })
        .then(function (response) {
            htmlSugestao += "<tr><td>"+response.data.idproduto+"</td><td>"+response.data.produto+"</td></tr>";

            $("#tableSugestao").html(htmlSugestao);
        })
        .catch(function (error) {
            console.log(error);
        });
    });
});
