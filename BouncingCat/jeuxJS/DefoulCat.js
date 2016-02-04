	$(document).ready(function () { 				
		/* On applique le plugin throwable à la div "balls1	*/			
		$(".balls1").throwable({
			containment: "parent",		//rebondis que dans la div "parent"
			drag:true,				//permet de désactiver la fonction drag avec false
			gravity:{x:0,y:1},			//applique la gravité avec x et y modifiant la vitesse
			impulse:{					//applique une impulsion : 
				f:70,					//entier qui définit la force de l'impulsion
				p:{x:2,y:2}				//donne la direction de l'impulsion
			},
			bounce:1,					//0 pas de rebond; 1 rebond max
			damping:0,				//ammortissement (entre 0 et l'infini; 0 signifie aucun ammortissement)  
			areaDetection:[[600,250,1,1]],
			// permet de déclancher un évènement un l'élément est inarea ou outarea (forme d'un carré)
			// [400,250] coordonnées du début de la zone
			// [1,1] "épaisseur" de la zone
		});
		
		$(document).on("inarea",function (event,data){
							/* tire un nombre aléatoire pour avoir une chance sur 8 de prendre une certaine couleur.*/
							nbr = Math.random();
							val_possibles= nbr*8;
							nbrTire = Math.floor(val_possibles);
							if (nbrTire == 0) {$(".balls1").css('background-image', 'url(./img/Cats/CatRge.png)');} 
							if (nbrTire == 1) {$(".balls1").css('background-image', 'url(./img/Cats/Cat.png)');}
							if (nbrTire == 2) {$(".balls1").css('background-image', 'url(./img/Cats/CatBlanc.png)');}
							if (nbrTire == 3) {$(".balls1").css('background-image', 'url(./img/Cats/CatBlu.png)');}
							if (nbrTire == 4) {$(".balls1").css('background-image', 'url(./img/Cats/CatBlu2.png)');}
							if (nbrTire == 5) {$(".balls1").css('background-image', 'url(./img/Cats/CatGreen.png)');}
							if (nbrTire == 6) {$(".balls1").css('background-image', 'url(./img/Cats/CatRose.png)');}
							if (nbrTire == 7) {$(".balls1").css('background-image', 'url(./img/Cats/CatYellow.png)');}
                        });

});

