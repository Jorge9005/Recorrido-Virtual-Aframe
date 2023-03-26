AFRAME.registerComponent('change-site', {
  schema: {
    img: {
      default: "", type: "string"
    },
    sound: {
      default: "", type: "string"
    },
    zone: {
      default: "", type: "string"
    }
  },

  init: function () {
    var data = this.data;
    var el = this.el;
    this.el.addEventListener('click', function () {
      console.log("clickió");

      var parentEntity = el.parentNode;
      var grandParentEntity = parentEntity.parentNode;

      var thisAImage = parentEntity.querySelector("a-image");
      thisAImage.classList.remove("clickable");
      console.log("thisAImage: " + JSON.stringify(thisAImage.classList));

      var allAImage = grandParentEntity.querySelectorAll("a-image");
      Object.keys(allAImage).forEach(function(key){
        if(allAImage[key] != thisAImage) {
          allAImage[key].classList.add("clickable");
        }
      });

      Object.keys(allAImage).forEach(function(key){
        allAImage[key].setAttribute("visible", "false");
        allAImage[key].classList.remove("clickable");
      });

      var allAImageInThisZone = parentEntity.querySelectorAll(data.zone);
      Object.keys(allAImageInThisZone).forEach(function(key){
        allAImageInThisZone[key].setAttribute("visible", "true");
        allAImageInThisZone[key].classList.add("clickable");
      });

      var mySky = document.querySelector("#my-sky");
      mySky.setAttribute("sound", "src", data.sound);
      mySky.setAttribute("material", "src", data.img);

      if(mySky.getAttribute("sounding") == "true"){
        mySky.components.sound.playSound();
      }

      console.log("terminó clickió");
    });
  }
});