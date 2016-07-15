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

function ivalue(uno,ivar){
  var i = document.getElementsByName(uno);
  var j = document.getElementsByName(ivar);
  var k;
  k = i[0].value * 0.13;
  j[0].value = k.toFixed(2);
}

function cuota(capital,interes,plazo,cuota){
  var k = document.getElementsByName(capital);
  var i = document.getElementsByName(interes);
  var p = document.getElementsByName(plazo);
  var r = document.getElementsByName(cuota);
  var its = i[0].value / 100;
  var per = p[0].value * -1;
  var num = k[0].value * its;
  var sum = 1 + its;
  var pot = Math.pow(sum, per);
  var den = 1-pot;
  var c = num/den;
  r[0].value = c.toFixed(2);
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
function verdeposito ()
{
  if(document.getElementById('efe1').checked == true)
  {
    document.getElementById('banco').style.display='none';
    document.getElementById('caja').style.display='block';
  }
  else if(document.getElementById('efe0').checked == true)
  {
    document.getElementById('caja').style.display='none';
    document.getElementById('banco').style.display='block';
  }


}

function verEstado ()
{
  var y = document.getElementsByClassName('credit2');
  if(document.getElementById('est1').checked == true)
  {
    document.getElementById('nuevo').style.display='none';
  }
  else if(document.getElementById('est0').checked == true)
  {
    document.getElementById('nuevo').style.display='block';
  }
}

function vercredito ()
{
  var x = document.getElementsByClassName('credit');
  var z = document.getElementsByClassName('delta');
  var i;
  if(document.getElementById('cred1').checked == true)
  {
    for(i=0;i<x.length;i++){
      x[i].style.display = 'block';
    }
    z[0].style.marginLeft = 0;
  }
  else if(document.getElementById('cred0').checked == true)
  {
    for(i=0;i<x.length;i++){
      x[i].style.display = 'none';
    }
    z[0].style.marginLeft = 0-6;
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

function cambio(tab,titulo){
  var x = document.getElementsByClassName('tabs');
  for(i=0;i<x.length;i++){
      x[i].style.display = 'none';
  }
  document.getElementById(tab).style.display = 'block';
  var x = document.getElementsByClassName('activ');
  for(i=0;i<x.length;i++){
      x[i].classList.remove('activ');
  }
  document.getElementById(titulo).classList.add('activ');
}
