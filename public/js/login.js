$(document).ready(function(){
    var token= localStorage.getItem('token');
    var urlBase= $("#urlBase").val();

    if(token != undefined){
        window.open('/home','_self');
    }

    $("#btEntrar").click(function(){
        let email= $('#email').val();
        let senha= $('#password').val();

        if(email == '') {
            M.toast({html: 'Favor, preencha o campo E-mail.'});
        } else if(senha == '') {
            M.toast({html: 'Favor, preencha o campo Senha.'});
        } else {
            data= '{"email":"'+email+'","password":"'+senha+'"}';

            axios.post(urlBase+'/api/auth/login',data,{
                headers: {
                    'Content-Type': 'application/json'
                }
            })
            .then(function (response) {
                localStorage.setItem('token', response.data.token);
                window.open('/home', '_self');
            })
            .catch(function (error) {
                M.toast({html: 'Não foi possível autenticar, verifique as credenciais informadas.'});
            });
        }


    });
});
