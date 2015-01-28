/*
//particulas
function particularinicio() {
//particular();
fabricastar();
}
var canvita = document.getElementById("spark");
var ctxvita = canvita.getContext("2d");

var posX = 0, posY = 0;
var pospX = 0, pospY = 0, pr=1.5, reto=0;
var posstX = 0, posstY = 0;

var cajita = new Array();
var nps = 0;
var startino = 0;
function fabricastar(){
//cajita = [];
nps++;


var dcenter =  (Math.random() * 40 ) + 240;
var angle = (Math.random() * 70) + 200;
var limite = (Math.random() * 10) + 15;

posstX =  250 + (dcenter * Math.cos(angle));
posstY =  250 + (dcenter * Math.sin(angle));

//posstX = (Math.random() * 200) -50;
//posstY = (Math.random() * 150) -50;

	cajita.push({'posstX':posstX,'posstY':posstY,'pr':1.5,'reto':0,'limite':limite})	;		
	if(nps > 20 ){
	drawmestar();
	nps = 0;
	
	}else{
		setTimeout(function(){fabricastar();}, 10);
		
	}
	
}
function fabricastarone(){
//cajita = [];
nps++;

var dcenter =  (Math.random() * 30 ) + 210;
var angle = Math.random() * 360;
var limite = (Math.random() * 10) + 15;

posstX =  250 + (dcenter * Math.cos(angle));
posstY =  250 + (dcenter * Math.sin(angle));

//posstX = (Math.random() * 200) -50;
//posstY = (Math.random() * 150) -50;

	cajita.push({'posstX':posstX,'posstY':posstY,'pr':1.5,'reto':0,'limite':limite})	;		
	
	
	nps = 0;
	
	
	
}
 function drawmestar(){
 ctxvita.clearRect(0,0,500, 500);
	 for(var i = 0; i < cajita.length; i++){
		var nposX = cajita[i]['posstX'];
		var nposY = cajita[i]['posstY'];;
		var npr =cajita[i]['pr'];;
		var nreto =cajita[i]['reto'];
		var nlim =cajita[i]['limite'];


	star(ctxvita, nposX, nposY, npr, 4, 0.1);

     if(nreto == 0){
	  npr += 0.25;
  }else{
	  npr -= 0.25;
  }
  
  if(npr > nlim){
	   nreto = 1;
  }
   if(npr < 2){
	   nreto = 0;
  }
  
  cajita[i]['pr']= npr;
 cajita[i]['reto']= nreto;


			if(npr < 3 && nreto == 1 ){
				cajita.splice(i, 1);
				//alert(npr);
				fabricastarone();
			}
//alert(cajon[i]['posX']);
  
	 }
	
	if(cajita.length == 0){
	startino = 0;
	//vy = -30;
	//fabricastar();
	//alert(cajita.length);	
	}else{
		setTimeout(function(){drawmestar()}, 10);	
	}
	 
	
 }
 


function particular() {
  //posX += 1;
  //posY += 0.25;
   if(reto == 0){
	  pr += 0.25;
  }else{
	  pr -= 0.25;
  }
  
  if(pr > 25){
	   reto = 1;
  }
   if(pr < 2){
	   reto = 0;
	   posX = (Math.random() * 100) +100 - 50;
  posY = (Math.random() * 50)+100 - 50;;
  }
  
  if(pospX == 0){pospX = posX}
  if(pospY == 0){pospY = posY}
  
  


 
      ctxvita.clearRect(0,0,150,150);
    
   star(ctxvita, posX, posY, pr, 4, 0.1);
   
    //ctxvita.beginPath();
  //ctxvita.fillStyle = "red";
  // After setting the fill style, draw an arc on the canvas
  //ctxvita.arc(posX, posY, pr, 0, Math.PI*2, true); 
 // ctxvita.closePath();
 // ctxvita.fill();
    
     // Draw a circle particle on the canvas   
  ctxvita.beginPath();
  ctxvita.fillStyle = "white";
  // After setting the fill style, draw an arc on the canvas
  ctxvita.arc(posX, posY, 2, 0, Math.PI*2, true); 
  ctxvita.closePath();
  ctxvita.fill();
  
  setTimeout(function(){particular()}, 50);
  
}



function star(ctxvita, x, y, r, p, m)
{
ctxvita.fillStyle = "rgba(255,255,255,0.5)";
    ctxvita.save();
    ctxvita.beginPath();
    ctxvita.translate(x, y);
    ctxvita.moveTo(0,0-r);
    for (var i = 0; i < p; i++)
    {
        ctxvita.rotate(Math.PI / p);
        ctxvita.lineTo(0, 0 - (r*m));
        ctxvita.rotate(Math.PI / p);
        ctxvita.lineTo(0, 0 - r);
    }
    ctxvita.fill();
    ctxvita.restore();
}

*/



//ANIMACION CONFETII
//confetti1
var canvasconfetti;
if( document.getElementById('confetti') === null){
		var canvi = document.createElement("canvas");
    canvi.id = "confetti";
    canvi.style.display = "none";
   var mod = document.getElementById('screentextos');
    mod.appendChild(canvi);
    canvasconfetti = document.getElementById("confetti");
	}else{
		canvasconfetti = document.getElementById("confetti");
	}
var ctxconfetti = canvasconfetti.getContext("2d");
var posX = 250,
    posY = 200;
 // Initial velocities
var vx;
    vy = -20,
    gravity = 0.5;

var cajon = new Array;
var confetino = 0; 
function lanzaconfetti(){
	if(confetino == 0){
		confetino = 1;
		fabrica();
	npa = 0;
	posX = 250,
	posY = 200;
	vy = -20,
	gravity = 0.5;
	 cajon =[]; 
	}
  	
}

var npa = 0;
function fabrica(){
npa++;
vx = (Math.random() * 10) - 5;
posX = (Math.random() * 100) +200;
posY = 200;
vy += gravity;
	var r = parseInt((Math.random() * 255) +50);
	var g = parseInt((Math.random() * 255) +50);
	var b = parseInt((Math.random() * 255) +50);
	var rd = parseInt((Math.random() * 10) +1);
	cajon.push({'posX':posX,'posY':posY,'vy':vy,'vx':vx,'r':r,'g':g,'b':b,'rd':rd})	;		
	if(npa > 100 ){
	drawme();
	npa = 0;
	//alert(cajon.length);
	}else{
		setTimeout(function(){fabrica();}, 10);
		
	}
}


 
 function drawme(){
 ctxconfetti.clearRect(0,0,canvasconfetti.width, canvasconfetti.height);
	 for(var i = 0; i < cajon.length; i++){
		var nposX = cajon[i]['posX'];
		var nposY = cajon[i]['posY'];;
		var nvy =cajon[i]['vy'];;
		var nvx =cajon[i]['vx'];;
		var r = cajon[i]['r'];
		var g = cajon[i]['g'];
		var b = cajon[i]['r'];
		var rd = cajon[i]['rd'];
		
		
		 ctxconfetti.beginPath();
  //ctxconfetti.fillStyle = "rgb("+r+","+g+","+b+")";
ctxconfetti.fillStyle = "rgba(255,183,0,0.7)";
 // ctxconfetti.arc(nposX, nposY, rd, 0, Math.PI*2, true); 
 
  //ESTRELLA

 var nPoints = 5;
 var outerRadius = rd*2;
  var innerRadius = rd/2;
        //ctxconfetti2.beginPath();
        for (var ixVertex = 0; ixVertex <= 2 * nPoints; ++ixVertex) {
            var angle = ixVertex * Math.PI / nPoints - Math.PI / 2;
            var radius = ixVertex % 2 == 0 ? outerRadius : innerRadius;
            ctxconfetti.lineTo(nposX + radius * Math.cos(angle), nposY + radius * Math.sin(angle));
        }
 
 
 
 
  ctxconfetti.closePath();
  ctxconfetti.fill();
  
  cajon[i]['posX']= nposX + nvx;
cajon[i]['posY']= nposY + nvy;
cajon[i]['vy']= nvy + gravity;

			if(nposY > 500){
				cajon.splice(i, 1);
			}
//alert(cajon[i]['posX']);
  
	 }
	
	if(cajon.length == 0){
	confetino = 0;
	//vy = -30;
	//fabrica();	
	}else{
		setTimeout(function(){drawme()}, 100);	
	}
	 
	
 }
 
 
 //confetti2
var canvasconfetti2;
if( document.getElementById('confetti2') === null){
		var canvi2 = document.createElement("canvas");
    canvi2.id = "confetti2";
    canvi2.style.display = "none";
   var mod = document.getElementById('screentextos');
    mod.appendChild(canvi2);
    canvasconfetti2 = document.getElementById("confetti2");
	}else{
		canvasconfetti2 = document.getElementById("confetti2");
	}

var ctxconfetti2 = canvasconfetti2.getContext("2d");
var posX2 = 50,
    posY2 = 50;
 // Initial velocities
var vx2;
    vy2 = -20,
    gravity2 = 0.5;

var cajon2 = new Array;
var confetino2 = 0; 
function lanzaconfetti2(){
	if(confetino2 == 0){
		confetino2 = 1;
		fabrica2();
	npa2 = 0;
	posX2 = 50,
	posY2 = 50;
	vy2 = -1,
	gravity2 = 0.5;
	 cajon2 =[]; 
	}
  	
}

var npa2 = 0;
var humo = 0;

function fabrica2(){
npa2++;
vx2 = (Math.random() * 5) - 2;
posX2 = ((Math.random() * 25) -10) + 100;
posY2 = 10;
vy2 += gravity2;
	var r2 = parseInt((Math.random() * 255) +50);
	var g2 = parseInt((Math.random() * 255) +50);
	var b2 = parseInt((Math.random() * 255) +50);
	if(humo == 0){
		var rd2 = parseInt((Math.random() * 5) +1);
	}else{
		var rd2 = parseInt((Math.random() * 20) +5);
	}
	
	cajon2.push({'posX2':posX2,'posY2':posY2,'vy2':vy2,'vx2':vx2,'r2':r2,'g2':g2,'b2':b2,'rd2':rd2})	;		
	if(npa2 > 10 ){
	drawme2();
	npa2 = 0;
	//alert(cajon.length);
	}else{
		setTimeout(function(){fabrica2();}, 10);
		
	}
}


 
 function drawme2(){
 ctxconfetti2.clearRect(0,0,canvasconfetti2.width, canvasconfetti2.height);
	 for(var i = 0; i < cajon2.length; i++){
		var nposX2 = cajon2[i]['posX2'];
		var nposY2 = cajon2[i]['posY2'];;
		var nvy2 =cajon2[i]['vy2'];;
		var nvx2=cajon2[i]['vx2'];;
		var r2 = cajon2[i]['r2'];
		var g2 = cajon2[i]['g2'];
		var b2 = cajon2[i]['r2'];
		var rd2 = cajon2[i]['rd2'];
		
		
		 ctxconfetti2.beginPath();
  //ctxconfetti2.fillStyle = "rgba("+r2+","+g2+","+b2+",0.5)";
  	if(humo == 0){
		 ctxconfetti2.fillStyle = "rgba(255,183,0,0.5)";
	}else{
		 ctxconfetti2.fillStyle = "rgba(0,0,0,0.1)";
	}
	
/* //ESTRELLA

 var nPoints = 5;
 var outerRadius = rd2*2;
  var innerRadius = rd2/2;
        //ctxconfetti2.beginPath();
        for (var ixVertex = 0; ixVertex <= 2 * nPoints; ++ixVertex) {
            var angle = ixVertex * Math.PI / nPoints - Math.PI / 2;
            var radius = ixVertex % 2 == 0 ? outerRadius : innerRadius;
            ctxconfetti2.lineTo(nposX2 + radius * Math.cos(angle), nposY2 + radius * Math.sin(angle));
        }

 */
 
  // arco
 ctxconfetti2.arc(nposX2, nposY2, rd2, 0, Math.PI*2, true); //dibujar arco
  ctxconfetti2.closePath();
  ctxconfetti2.fill();
  
  cajon2[i]['posX2']= nposX2 + nvx2;
cajon2[i]['posY2']= nposY2 + nvy2;
cajon2[i]['vy2']= nvy2 + gravity2;

			if(nposY2 > 100){
				cajon2.splice(i, 1);
			}
//alert(cajon[i]['posX']);
  
	 }
	
	if(cajon2.length == 0){
	confetino2 = 0;
	//vy = -30;
	lanzaconfetti2();
	//fabrica();	
	}else{
		setTimeout(function(){drawme2()}, 100);	
	}
	 
	
 }



 
 
 
function confettimov(){
ctxconfetti.clearRect(0,0,canvasconfetti.width, canvasconfetti.height);
	posX += vx;
posY += vy;
vy += gravity;
	var r = parseInt((Math.random() * 255) +100);
	var g = parseInt((Math.random() * 255) +100);
	var b = parseInt((Math.random() * 255) +100);
	var rd = parseInt((Math.random() * 10) +1);
	 var cftX = (Math.random() * 250) +100;
  var cftY = (Math.random() * 250)+100;
  ctxconfetti.beginPath();
  ctxconfetti.fillStyle = "rgb("+r+","+g+","+b+")";
  // After setting the fill style, draw an arc on the canvas
  ctxconfetti.arc(posX, posY, rd, 0, Math.PI*2, true); 
  ctxconfetti.closePath();
  ctxconfetti.fill();
  
  setTimeout(function(){confettimov()}, 50);
	
}


