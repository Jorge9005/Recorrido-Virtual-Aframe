//Prueba 1
$(function () {
    <script src="https://aframe.io/releases/1.3.0/aframe.min.js"></script>

    $(".primero").mouseenter(function () {
        $("#segundo").fadeOut();
    });

    $(".primero").mouseleave(function () {
        $("#segundo").fadeIn();
    });


    $("#btn-hide").click(function () {
        $(".sky").fadeOut();
        $(".btn-mas").fadeIn(1000);
    });


    $("#btn-show").click(function () {
        $("h1").toggleClass("blue");
    });

});


//Prueba 2
function mostrar(input) {
    var img = document.getElementById("img")
    if (input.value == "Ocultar") {
        img.style.visibility = "hidden";
        input.value = "Mostrar"
    }
    else {
        img.style.visibility = "visible"
        input.value = "Ocultar"
    }
}

//Prueba 3
function getEventType(event) {
    const log = document.getElementById('log');
    log.innerText = `${event.type}\n${log.innerText}`;
    document.addEventListener('keypress', getEventType, false);
    
}
document.querySelector('p').addEventListener('keypress', function (evt) {
    console.log('This 2D element was clicked!');
});


function ocultar(){
    document.getElementById('btn-hide').style.display = 'none';
}