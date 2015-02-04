if (document.getElementById) { window.onload = swap };
function swap() {
var numimages=2;
rndimg = new Array("img/header-bg1.jpg", "img/header-bg2.jpg"); 
x=(Math.floor(Math.random()*numimages));
randomimage=(rndimg[x]);
document.getElementById("header").style.backgroundImage = "url("+ randomimage +")"; 
}