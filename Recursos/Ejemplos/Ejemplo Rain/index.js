function toggleRain() {
    let a = document.getElementById('a');
    if (a.hasAttribute('rain')) {
      a.removeAttribute('rain');
    } else {
      a.setAttribute('rain', '1');
    }
    console.log ("ok");
  }