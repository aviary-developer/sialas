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
  if(document.getElementById('cred1').checked == true)
  {
    document.getElementById('credit').style.display='block';
    
    
  }
  else if(document.getElementById('cred0').checked == true)
  {
    document.getElementById('credit').style.display='none';

    
   
  }

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

