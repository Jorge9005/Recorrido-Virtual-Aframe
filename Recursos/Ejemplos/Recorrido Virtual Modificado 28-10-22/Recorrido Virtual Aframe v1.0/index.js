var imageEl = document.querySelector("a-image");
AFRAME.registerComponent('mono', {
    schema:{
      blood_type: {type: "string", default: "O-type"}, //El O-type se pondrá por defecto si no especificamos este valor en el html
    oxygen_level: {type: "string", default:"normal"},},
    init: function(){
        console.log(this.el.imageEl);
    }, 
});

/*
init: function(){
   this.el.addEventListener('click', function(img) {
      console.log("Hello");
      img.srcElement.setAttribute('visible', false);
  });
}
*/

/*
  AFRAME.registerComponent('hide', {
    schema:{},
    init: function(){
      this.a_image = document.querySelector("a-image");
      setTimeout(()=>{
        this.a_image.setAttribute("src","#dos")
        this.a_image.componentes.material.flushToDOM(true);
      }, 5000);
    },
  });
*/ 