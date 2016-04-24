function activo (vis,ocu,bot,img){
  var host = "http://"+window.location.hostname;
  if (document.getElementById(vis).style.display == "none") {
    document.getElementById(vis).style.display = "table";
    document.getElementById(ocu).style.display = "none";
    document.getElementById(bot).innerHTML = "Inactivos";
    document.getElementById(img).src = host+"/sialas/public/img/WB/general/circ.svg";
  }else{
    document.getElementById(vis).style.display = "none";
    document.getElementById(ocu).style.display = "table";
    document.getElementById(bot).innerHTML = "Activos";
    document.getElementById(img).src = host+"/sialas/public/img/WB/general/circ2.svg";
  }

}
