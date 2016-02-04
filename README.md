# BouncingCat

[FR] Ce projet a pour but la conception et la réalisation d’un site internet regroupant plusieurs jeux avec pour thème principal les chats.


## Installation

* BouncingCat : ensemble du projet

    1. CSS : fichiers css du projet
    2. config : fichiers php de configuration BD et Sessions (ATTENTION : il n'existe pas encore de scripts BD à importer...)
    3. controller
    4. model
    5. view
    6.img : images du projet
    7. jeuxHTML : fichiers php contenant UNIQUEMENT le code html du projet
    8. jeuxJS : fichiers js contenant UNIQUEMENT le code JavaScript et JQuery du projet
    9. js : imports JavaScript et JQuery nécéssaires
    
* BouncingCat_Rapport : rapport détaillé du projet et du développement en LaTeX.

## Spécificités 

Le site internet est capable de récupérer les données des diﬀérents jeux. Chaque jeu fonctionne de façon indépendante des autres. Pour gérer ces données, une base de données est utilisée pour stocker ou récupérer les scores des joueurs en fonction du jeu. Toutes les communications avec la base de données se font via le navigateur du joueur.

Le système de notre projet comporte deux acteurs et deux systèmes qui coopèrent. Le joueur et l’administrateur seront nos seuls acteurs. Le système principal ainsi que la base de données sont les deux systèmes qui coopèrent. Chaque acteur accède au système par Internet et communique avec la base de données via l’interface web. 

Après débat par l’ensemble de l’équipe, il a été décidé de développer trois jeux principaux dans l’application :

— Defoul’Cat : Le chat est seul sur l’espace de jeu. Le joueur peut envoyer le chat sur les bords de l’espace. Ce jeu ne présente pas de système de score. C’est un jeu pour se détendre.

— RainingCat : Une image de chat tombe du haut de l’écran par gravité. Le joueur doit l’attraper avec la souris. Le but est de ne pas laisser le chat toucher le sol. Au ﬁl du temps, un autre chat apparaît, il y a donc deux chats que l’on ne doit pas laisser tomber. Et ainsi de suite jusqu’à ce que le joueur perde. Le temps de vie du joueur est alors enregistré comme score.

— CatDefend : Un chat est attiré par la gravité et à la possibilité de tirer en face de lui. Le joueur peut le mouvoir et déclencher des eﬀets avec son clavier et sa souris. En face du chat, plusieurs ennemis (sous forme de vagues) se dirige vers le joueur pour le faire perdre. Celui-ci doit tirer sur ses adversaires.


# Contexte 

- RainingCat Réalisé par C. BRES
- Site Réalisé par E. BRUDY
- Defoul'Cat Réalisé par S. LHOPITAL
- CatDefend Réalisé par A. REZE
- 2014 - 2015
- IUT Montpellier - Sète