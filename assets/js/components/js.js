$('.message a').click(function(){
    $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
 });

 function info()
 {
    if(document.getElementById("container-info").style.visibility == "hidden")
    {
        for(i=1;i<1000;i++)
    {
        document.getElementById("container-info").style.visibility = "visible";
    }
    }
    else
    {
        for(i=1;i<1000;i++)
    {
        document.getElementById("container-info").style.visibility = "hidden";
    }
    }
   // document.getElementById("container-menu").style.visibility = "visible";
 }

 function menu()
 {
    if(document.getElementById("container-menu").style.visibility == "hidden")
    {
        for(i=1;i<1000;i++)
    {
        document.getElementById("container-menu").style.visibility = "visible";
    }
    }
    else
    {
        for(i=1;i<1000;i++)
    {
        document.getElementById("container-menu").style.visibility = "hidden";
    }
    }
 }

 function onh()
 {
    menu();
    info();
 }