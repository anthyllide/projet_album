#PROJET ALBUM

* LE BUT
--------

Le but de ce projet est de cr�er une application permettant d'uploader des images et surtout de les classer par th�mes
dans un r�pertoire sur le serveur.


* UTILISATION DU SITE
---------------------

L'id�e �tait de cr�er une page d'accueil o� l'utilisateur a acc�s aux photos t�l�charg�es. 
Pour l'ergonomie, un menu par lettre permet d'acc�der aux th�mes commen�ant par cette lettre.

ex. Le th�me "Avion" sera accessible � partir de la lettre A du menu.

Ensuite, pour faire afficher les images d'un th�me, l'utilisateur clique sur le th�me qui l'int�resse.

Pour t�l�charger les images, l'utilisateur doit s'enregistrer sur le site. Pour cela, il doit renseigner email et mot de passe.

Il aura ensuite acc�s � la page upload o� il pourra t�l�charger les images qu'ils souhaitent et choisir un th�me ou bien cr�er un nouveau th�me.


* REPERTOIRES ET SOUS-REPERTOIRES
----------------------------------

Les images � t�l�charger sont en vrac dans le r�pertoire "images_vrac".

Le r�pertoire "images_rep" contient les images class�es selon leur th�me.

Le r�pertoire "thumbnails_rep" contient les images redimensionn�es en miniature class�es selon leur th�me.
Ce choix de miniature s'est impos� pour un affichage des images sur le site plus esth�tique et "moins lourd".

Chaque sous-r�pertoire repr�sente un th�me. Le sous-r�pertoire est cr��, s'il n'existe pas, avec la fonction mkdir().
Cependant, j'ai d�couvert que cette fonction n'accepte pas l'encodage UTF8 et de toute fa�on je pr�f�re que les noms de r�pertoire
ne contiennent pas d'accents, ni d'espaces. Pour contrer ce probl�me, j'ai d� faire des remplacements de caract�res.


* RENOMMER LES IMAGES
----------------------

Chaque image est renomm�e apr�s son upload par "nomdutheme"_"image"_"n�image", idem pour les miniatures, mais un "tiny" est ajout�;

Pour num�roter l'image, on compte pr�ablement le nombre de lignes dans la table "images" ayant le champs theme = "nomdutheme".
Puis, on incr�mente de 1.

* images accept�es
-------------------

Seules les images de 300Ko ou moins (pour ne pas surcharger le serveur), les .jpg et de dimensions inf�rieures ou �gales
� 600x450px sont accept�es.

Si ces trois conditions ne sont pas r�unies, les images ne sont pas t�l�charg�es et une erreur
apparait.










