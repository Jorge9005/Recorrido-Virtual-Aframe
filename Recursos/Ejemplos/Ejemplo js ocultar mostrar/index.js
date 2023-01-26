function mostrar(input)
{
    var img=document.getElementById("img")
    if(input.value=="Ocultar")
    {
        img.style.visibility="hidden";
        input.value="Mostrar"
    }
    else
    {
        img.style.visibility="visible"
        input.value="Ocultar"
    }
}