$(document).ready(function(){
    alert("To funfando");

    $("#lkz").click(function(){

        $.ajax({
            url: "../api/salva_ong",
            method: "POST",
            data: { 
                nome: $("#nome").val(),
                email: $("#email").val(),
                descricao: $("#descricao").val(),
                
                
                 },
            success: function (res) {
                console.log(res);

                
            },
            error: function (xhr) {

                console.log();
            }
        });
    });
});