$('#cadastrar_conta').submit(function(e){

    e.preventDefault();

    var descricao = $('#descricao').val();
    var valor = $('#valor').val();

    console.log(descricao, valor);

    $.ajax({
        url: 'inserir-conta.php',
        method: 'POST',
        data: {descricao: descricao, valor: valor},
        dataType: 'json'
    }).done(function(result){
        $('#valor').val('');
        $('#descricao').val('');
        console.log(result);
        getComments();
    });

});


function getComments(){

    $.ajax({
        url: 'selecionar-contas.php',
        method: 'GET',
        dataType: 'json'
    }).done(function(result){
        
        console.log(result);

        $('.retorno').prepend('<tr><th>Data</th><th>Descrição</th><th>Valor</th></tr>');

        for(var i = 0; i < result.length; i++){

            // $('.retorno').prepend('<p>'+result[i].descricao+' '+result[i].valor+'</p>');

            $('.retorno').prepend('<tr><td>'+result[i].data+'</td><td>'+result[i].descricao+'</td><td>R$ '+result[i].valor+'</td></tr>');
        
        }

    });

}

getComments();

