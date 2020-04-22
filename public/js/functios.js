$(document).ready(function(){
    var token= localStorage.getItem('token');
    var urlBase= $("#urlBase").val();

    if(token == '' || token == undefined){
        window.open('/login','_self');
    }

    $(".voltar").click(function(){
        $(this).parent().parent().hide('slow');
    });

    $("#sair").click(function(){
        data= '{"token":"'+token+'"}';

        axios.post(urlBase+'/api/auth/logout',data,{
            headers: {
                'Content-Type': 'application/json'
            }
        })
            .then(function (response) {
                localStorage.removeItem('token');
                window.open('/login','_self');
            })
            .catch(function (error) {
                console.log(error);
            });
    });
});
