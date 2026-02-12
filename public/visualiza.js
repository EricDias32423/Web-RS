$(document).ready(function(){
    alert("To funfando");

    $("#lkz").click(function(){

        $.ajax({
            url: "../api/ongs" + $("#id_ong").val,
            method: "GET",
            
            success: function (res) {
                console.log(res);

                
            },
            error: function (xhr) {

                console.log();
            }
        });
    });
});