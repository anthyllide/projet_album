#PROJET ALBUM

* LE BUT
--------

Le but de ce projet est de créer une application permettant d'uploader des images et surtout de les classer par thèmes
dans un répertoire sur le serveur.


* UTILISATION DU SITE
---------------------

L'idée était de créer une page d'accueil où l'utilisateur a accès aux photos téléchargées. 
Pour l'ergonomie, un menu par lettre permet d'accèder aux thèmes commençant par cette lettre.

ex. Le thème "Avion" sera accessible à partir de la lettre A du menu.

Ensuite, pour faire afficher les images d'un thème, l'utilisateur clique sur le thème qui l'intéresse.

Pour télécharger les images, l'utilisateur doit s'enregistrer sur le site. Pour cela, il doit renseigner email et mot de passe.

Il aura ensuite accès à la page upload où il pourra télécharger les images qu'ils souhaitent et choisir un thème ou bien créer un nouveau thème.


* REPERTOIRES ET SOUS-REPERTOIRES
----------------------------------

Les images à télécharger sont en vrac dans le répertoire "images_vrac".

Le répertoire "images_rep" contient les images classées selon leur thème.

Le répertoire "thumbnails_rep" contient les images redimensionnées en miniature classées selon leur thème.
Ce choix de miniature s'est imposé pour un affichage des images sur le site plus esthétique et "moins lourd".

Chaque sous-répertoire représente un thème. Le sous-répertoire est créé, s'il n'existe pas, avec la fonction mkdir().
Cependant, j'ai découvert que cette fonction n'accepte pas l'encodage UTF8 et de toute façon je préfère que les noms de répertoire
ne contiennent pas d'accents, ni d'espaces. Pour contrer ce problème, j'ai dû faire des remplacements de caractères.


* RENOMMER LES IMAGES
----------------------

Chaque image est renommée après son upload par "nomdutheme"_"image"_"n°image", idem pour les miniatures, mais un "tiny" est ajouté;

Pour numéroter l'image, on compte préablement le nombre de lignes dans la table "images" ayant le champs theme = "nomdutheme".
Puis, on incrémente de 1.

* images acceptées
-------------------

Seules les images de 300Ko ou moins (pour ne pas surcharger le serveur), les .jpg et de dimensions inférieures ou égales
à 600x450px sont acceptées.

Si ces trois conditions ne sont pas réunies, les images ne sont pas téléchargées et une erreur
apparait.










