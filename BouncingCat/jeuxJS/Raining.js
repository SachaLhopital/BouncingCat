$(document).ready(function () {
	
	aPerdu = false;	
	
	/* On applique le plugin throwable à la div "objectChat"	*/			
	$(".objectChat").throwable({
		containment: "parent",		//rebondis que dans la div "parent"
		drag:true,				//permet de désactiver la fonction drag avec false
		gravity:{x:0,y:1},			//applique la gravité avec x et y modifiant la vitesse
		impulse:{					//applique une impulsion : 
			f:70,					//entier qui définit la force de l'impulsion
			p:{x:0,y:1}				//donne la direction de l'impulsion
		},
		bounce:1,					//0 pas de rebond; 1 rebond max
		damping:0,				//ammortissement (entre 0 et l'infini; 0 signifie aucun ammortissement)
		autostart: true,
		areaDetection:[[0,0,1000,636]],
			// permet de déclencher un évènement un l'élément est inarea ou outarea (forme d'un carré)
			// [x,y,x,y]
			// [0,0] coordonnées du début de la zone
			// Calcul y : (80*80)+(80*80) = 12800 , sqrt(12800) = 113,137 , 750 - 114 = 636
			// Pourquoi un calcul complexe ?
				// En fait, il s'agit de la valeur css top qui est testee. Et elle est calculee par rapport au point le plus proche du haut de l'écran de la div du chat.
				// En plus, il faut faire attention que si le chat touche le sol en diagonal, il faut compter la diagonal du carre de 80*80px que le chat represente.
				// Donc on utilise Pythagore.
				// Souci, si je prends 636 comme valeur, si le chat n'est pas en diagonal quand il touche le sol, il le touchera plus "tot".
				// J'ai choisi de le faire marcher en diagonal car sinon, la condition de fin du jeu se traduirait par "si le chat s'arrete au sol".
			// [1000,636] coordonnées de fin de la zone
			
			// Sur le papier voila ce que ca donne. Dans les faits je ne comprends toujours pas le comportement exact du bordel du coup j'ai laissé la valeur théorique.
			// Piste : les valeurs top des chats ne sont pas suffisamment rafraichi, du coup des valeurs "sautent" les tests. Et c'est exactement celles qui nous interessenr.
		collisionDetection: false		//detecte la collision ou pas. 
	});
	
	
	
	// Cette fonction ajoute un chat, contenu dans la zone de jeu, appliqué à la gravité
	function ajouterChat() {
		if (!(aPerdu)) {												// verifie si le jeu n'est pas déjà perdu 
			$(".parent").append("<div class=\"objectChat\" id=\"Chat\"></div>");	// ajoute dans la div parent, une div de chat
			var leftPosChat = Math.floor((Math.random() * 450) + 1);			// definit un nombre aléatoire pour positionner aléatoirement le chat à l'horizontal
			$("#Chat").css("left",leftPosChat);							// set la propriété left du css de la div chat nouvellement crée au nombre aléatoire
			$("#Chat").throwable({					//
				containment: "parent",				//
				drag:true,						//
				gravity:{x:0,y:1},					//
				impulse:{							//	
					f:70,						//
					p:{x:0,y:1}					//		Applique le plugin throwable, la gravité au nouveau chat
				},								//
				bounce:1,							//
				damping:0,
				autostart:true,				 		//
				areaDetection:[[0,0,1000,636]],		//
				collisionDetection: false				//
			});
		}
	}
	setInterval(ajouterChat, 5000);				// appelle la fonction ajouterChat() toutes les 5000ms
	
	// Cette fonction met à jour le score
	function score() {
		if (!(aPerdu)) {							// verifie si le jeu n'est pas déjà perdu 
			var sc = parseInt($('#score').text())+1;	// recupere le score dans la span d'id "score" et l'incrémente de 1
			$('#score').text(sc);					// inscrit le nouveau score dans la span
		}
	}
	setInterval(score,100);						// appelle la fonction score() toutes les 100ms
	
	// Recupere l'évenement outarea lancé par throwable pour determiner le game over
	$(document).on("outarea",function (event,data) {
		if (!(aPerdu)) {		// verifie si le jeu n'est pas déjà perdu 
			var p = confirm("Perdu !");
			
			if (p){
				var k =""+parseInt($('#score').text());
				document.location.href="http://axelsite.com/BouncingCat/?action=created&controller=score&id=Raining&score="+k; 
				}
		}
		aPerdu = true;			// qualifie le jeu de perdu dans une variable globale
	});
	
	
	
});
