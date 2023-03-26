
var lapass;
var lapassbool;

function rev()
{
    if(lapass != lapassbool) 
    {
        lapass="";
        lapassbool="";
        $('#test').removeClass();
        $('#test').addClass("testv");
        $('#test').text("Las no contraseñas coinciden");
        $("#test").show();
    }
    else
    {
        $('#test').removeClass();
        $('#test').addClass("testf");
        $('#test').text("Las contraseñas coinciden");
        if(lapass == "" && lapassbool == "")
        {
            $('#test').text("La contraseña esta vacia");
            $('#test').addClass("testd");
        }
        //$("#test").hide();
        $("#test").show();
    }
}

function pass()
{
    lapass = $('input[name=h_passuser]').val();
    lapassbool = $('input[name=h_passuserbool]').val();
    rev();
}

function passbool()
{
    lapass = $('input[name=h_passuser]').val();
    lapassbool = $('input[name=h_passuserbool]').val();
    rev();
}


