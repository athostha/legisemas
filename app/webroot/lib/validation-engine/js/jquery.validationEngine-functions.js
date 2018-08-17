function validaCPF(elem) {    
    cpf = elem.val();
    erro = new String;
    if (cpf.length != 11){        
        erro += "O campo deve 11 dígitos para verificação do CPF! \n\n";
    }        
    var nonNumbers = /\D/;
    
    if (nonNumbers.test(cpf)){
        erro += "A verificação de CPF suporta apenas numeros! \n\n";        
    }
    if (cpf == "00000000000" || cpf == "11111111111" || cpf == "22222222222" || cpf == "33333333333" || cpf == "44444444444" || cpf == "55555555555" || cpf == "66666666666" || cpf == "77777777777" || cpf == "88888888888" || cpf == "99999999999"){
        erro += "Número de CPF invalido!"
    }
    var a = [];
    var b = new Number;
    var c = 11;
    for (i=0; i<11; i++){
        a[i] = cpf.charAt(i);
        if (i < 9) b += (a[i] * --c);
    }
    if ((x = b % 11) < 2) {
        a[9] = 0
    } else {
        a[9] = 11-x
    }
    b = 0;
    c = 11;
    for (y=0; y<10; y++) b += (a[y] * c--);
    if ((x = b % 11) < 2) {
        a[10] = 0;
    } else {
        a[10] = 11-x;
    }
    if ((cpf.charAt(9) != a[9]) || (cpf.charAt(10) != a[10])){
        erro +="Dígito verificador com problema!";
    }
    if (erro.length > 0){
        //alert(erro);
        erros = "* Cpf inválido \n \n"
        erros += erro;
        
        return erros;
    }
        
}
function validaFile(elem) {
    file = elem.val();
    //alert(file);
    if(file == ""){
        return "* Campo Obrigatório;"
    }
}

function checaCep(elem) {
    cep = elem.val();
    fdata = {
        data:{
            cep:cep
        }
    };    
    resp = null;    
    $.ajax({
        async: false,
        type: "POST",
        url: "/usuarios/checaCep",
        data: fdata,
        dataType:'json',
        success: function(data){
            resp = data;
        }
    });    
    
    if(resp.status == "1"){
        aplicaEndereco(resp.dados.CepInfo);        
    }else{
        return resp.msg;                  
    }    
}

function aplicaEndereco(endereco){    
    $('input.logradouro').val(endereco.tp_logradouro +' '+ endereco.logradouro);
    $('input.bairro').val(endereco.bairro);
    $('input.cidade').val(endereco.cidade);  
}
