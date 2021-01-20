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
        console.log(result);
    });

})