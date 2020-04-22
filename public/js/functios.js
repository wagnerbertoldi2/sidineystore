$(document).ready(function(){
    $('#btCliente').click(function () {
        $('#modal-cliente').show('slow');
    });

    $(".voltar").click(function(){
        $(this).parent().parent().hide('slow');
    });

    var token= "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXBpL2F1dGgvbG9naW4iLCJpYXQiOjE1ODc1Njk0MDksImV4cCI6MTU4NzU3MzAwOSwibmJmIjoxNTg3NTY5NDA5LCJqdGkiOiJCTFVVQkNZWm5DY0tQU2NGIiwic3ViIjoxLCJwcnYiOiI4N2UwYWYxZWY5ZmQxNTgxMmZkZWM5NzE1M2ExNGUwYjA0NzU0NmFhIn0.oip-JuRNwP7APVt5fgWY1MO7rIBJz_KMugTLgJPJt20";

    axios.get('http://127.0.0.1:8000/api/lista-clientes', {
        headers: {
            'Authorization': 'Bearer '+token
        }
    })
    .then(function (response) {
        console.log(response);
    })
    .catch(function (error) {
        console.log(error);
    });
});
