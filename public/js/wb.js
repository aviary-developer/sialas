function activo (vis,ocu,bot,img){
  var host = "http://"+window.location.host;
  if (document.getElementById(vis).style.display == "none") {
    document.getElementById(vis).style.display = "table";
    document.getElementById(ocu).style.display = "none";
    document.getElementById(bot).innerHTML = "Papelera";
    document.getElementById(img).src = host+"/sialas/public/img/WB/pre.svg";
    document.getElementById('txt').innerHTML = "|Activos";
    document.getElementById('act').style.display = "block";
    document.getElementById('inc').style.display = "none";
  }else{
    document.getElementById(vis).style.display = "none";
    document.getElementById(ocu).style.display = "table";
    document.getElementById(bot).innerHTML = "Activos";
    document.getElementById(img).src = host+"/sialas/public/img/WB/dat.svg";
    document.getElementById('txt').innerHTML = "|Papelera";
    document.getElementById('act').style.display = "none";
    document.getElementById('inc').style.display = "block";
  }
}


function ver ()
{
  if(document.getElementById('efe1').checked == true)
  {
    document.getElementById('banco').style.display='none';
    document.getElementById('cheque').style.display='none';
    document.getElementById('caja').style.display='block';
  }
  else if(document.getElementById('efe0').checked == true)
  {
    document.getElementById('caja').style.display='none';
    document.getElementById('banco').style.display='block';
    document.getElementById('cheque').style.display='block';
  }


}

function verEstado ()
{
  var y = document.getElementsByClassName('credit2');
  if(document.getElementById('est1').checked == true)
  {
    document.getElementById('nuevo').style.display='none';
    document.getElementById('anio').style.display='none';
    if(document.getElementById('cred1').checked == true){
      y[0].style.display = 'block';
      y[0].style.visibility = 'visible';
    }else if(document.getElementById('cred0').checked == true){
      y[0].style.display = 'block';
      y[0].style.visibility = 'hidden';
    }
  }
  else if(document.getElementById('est0').checked == true)
  {
    if(document.getElementById('cred1').checked == true){
      document.getElementById('nuevo').style.display='block';
    }else if(document.getElementById('cred0').checked == true){
      y[0].style.display = 'none';
      document.getElementById('anio').style.display = 'block';
    }
  }
}

function vercredito ()
{
  var x = document.getElementsByClassName('credit');
  var y = document.getElementsByClassName('credit2');
  var z = document.getElementsByClassName('delta');
  var i;
  if(document.getElementById('cred1').checked == true)
  {
    for(i=0;i<x.length;i++){
      x[i].style.display = 'block';
    }
    if(document.getElementById('est0').checked == true){
      document.getElementById('nuevo').style.display = 'block';
      document.getElementById('anio').style.display = 'none';
      y[0].style.display = 'block';
    }else if (document.getElementById('est1').checked == true){
      document.getElementById('nuevo').style.display = 'none';
      document.getElementById('anio').style.display = 'none';
    }
    y[0].style.visibility = "visible";
    z[0].style.marginLeft = 0;
    document.getElementById('credit').style.display = 'inline-flex';
  }
  else if(document.getElementById('cred0').checked == true)
  {
    for(i=0;i<x.length;i++){
      x[i].style.display = 'none';
    }
    if(document.getElementById('est0').checked == true){
      document.getElementById('nuevo').style.display = 'none';
      document.getElementById('anio').style.display = 'block';
      y[0].style.display = 'none';
    }
    y[0].style.visibility = 'hidden';
    z[0].style.marginLeft = -6;
    document.getElementById('credit').style.display = 'none';
  }
}

function credit ()
{
  if(document.getElementById('cre1').checked == true)
  {
    document.getElementById('interes').style.display='block';
    document.getElementById('mora').style.display='block';
  }
  else if(document.getElementById('cre0').checked == true)
  {
    document.getElementById('interes').style.display='none';
    document.getElementById('mora').style.display='none';
  }
}

  function verprecio ()
{

  if(document.getElementById('pre1').value == 0)
  {
    document.getElementById('precio').style.display='block';

  }
  else if(document.getElementById('pre1').value !=0)
   {
    document.getElementById('precio').style.display='none';
   }

   if(document.getElementById('pre1').value == 4)
  {
    document.getElementById('institu').style.display='block';

  }
  else if(document.getElementById('pre1').value !=4)
   {
    document.getElementById('institu').style.display='none';
   }
}
