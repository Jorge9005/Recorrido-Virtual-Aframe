AFRAME.registerComponent('blood', {
    schema: {
      blood_type: {type: "string", default: "O-type"}, //El O-type se pondrá por defecto si no especificamos este valor en el html
      oxygen_level: {type: "string", default:"normal"},
    },
    init: function () {
      console.log("Hello, I'm blood" + " " + this.data.blood_type + " " + this.data.oxygen_level);
      console.log(this.el);
      let Julian = document.querySelector('#Julian');
      console.log(Julian);

      let data = this.data;
      
      this.el.addEventListener('click', function(obj){
        console.log(data);
        console.log(obj);
        //obtener el componente que queremos cambiar
        let oldPosition = obj.srcElement.getAttribute('position');
        console.log(oldPosition);
        let newY = oldPosition.y + 0.2;

        obj.srcElement.setAttribute('position', oldPosition.x + " " + newY + "-3");
        obj.srcElement.setAttribute('blood', 'blood_type: B-type');
    });
    console.log("===INITIALISED===");
  },
  update: function (oldData){
    console.log("oldData: " + oldData.blood_type);
    console.log("===UPDATE===");
    console.log(this.data.blood_type);
  },

  tick:function (){ //los TICK son como las funciones automáticas del cuerpo humano, como por ejemplo, respirar.
    this.el.getObject3D("mesh").rotation.y += 0.01; //el "mesh" es el conjunto de vértices y polígonos de un objeto 3D, siempre tiene que llevar esta propiedad
  }
});
