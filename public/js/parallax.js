 const par = document.getElementById('par');
 window.addEventListener("scroll",function(){
    let offset = window.pageYOffset;
    par.style.backgroundPositionY= offset*0.7+ "px";
 })