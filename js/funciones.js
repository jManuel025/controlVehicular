function cargar() {
    var mydiv = document.getElementsByClassName(".central");
    if (mydiv.innerHTML == "") {
        // alert("Div está vacío");
        var parametros = {};
        $.ajax({
            data: parametros,
            url: '../html/FConductores.html',
            type: 'post',
            cache: false,
            success: function response(response) {
                $('.central').append(response);
            }
        });
    }
    else{
        // alert("No está vacío");
        document.getElementsByClassName(".central").innerHTML = "";
        cargar();
    }
}