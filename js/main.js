  
window.onload = function(){
      manager = new jsAnimManager(40);
      capaAnimar = manager.createAnimObject("player"); 


      




   }
    var spe;
    var uno;

    function mandar(spped){
    	document.getElementById("correr").style.display = "none";
    	
    	animacion(spped);
    	document.getElementById("pausar").style.display = "block";
    	document.getElementById("seguir").style.display = "none";

    }


   function animacion(speed) {
   	if(speed==null ){
   		uno=0;
   		speed=spe;
   	}else{
   		uno=1;
   		spe=speed;
   	}

   	uno=uno*speed;
    if(speed>=9){
    capaAnimar.add({property: Prop.left, to: 540, duration: 1200, ease: jsAnimEase.backout(0)});
    capaAnimar.add({property: Prop.left, to: 0, duration: 1, onComplete: animacion});
    
    }else if (speed>7) {
    capaAnimar.add({property: Prop.left, to: 510, duration: 4800, ease: jsAnimEase.backout(0)});
    capaAnimar.add({property: Prop.left, to: 20, duration: 1, onComplete: animacion});
    

    }else if(speed>=6){
    capaAnimar.add({property: Prop.left, to: 480, duration: 9200, ease: jsAnimEase.backout(0)});
    capaAnimar.add({property: Prop.left, to: 20, duration: 1, onComplete: animacion});
    
    }else{
    capaAnimar.add({property: Prop.left, to: 300, duration: 10500, ease: jsAnimEase.backout(0)});
    capaAnimar.add({property: Prop.left, to: 0, duration: 1, onComplete: animacion});
    
    }
 
   

   }

   function parar(){
   	document.getElementById("seguir").style.display = "block";
	document.getElementById("pausar").style.display = "none";
      manager.pause();
   }
   function proseguir(){
    document.getElementById("seguir").style.display = "none";
	document.getElementById("pausar").style.display = "block";
     
      manager.resume();
   }


  