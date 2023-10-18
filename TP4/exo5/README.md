API Fonctionnement

GET 
Lecture d'un ou tous les utilisateurs.
Paramètre : id ou rien.
Renvoie l'identifiant, le nom et le mail de la personne ou des personnes si succès (code 201).
Renvoir le code 500 en cas d'échec.

POST  
Ajoute un utilisateur à la base de données.
Paramètre : nom et mail.
Renvoie l'identifiant (id) de la création si succès (code 201).
Renvoir le code 500 en cas d'échec.

PUT
Modifie un utilisateur de la base de données.
Paramètre : id, nom et mail.
Renvoie l'identifiant, le nom et le mail de la personne dont le profil a été modifié si succès (code 200).
Renvoir le code 500 en cas d'échec.

DELETE
Supprime un utilisateur de la base de données.
Paramètre : id.
Renvoie un message de réussite si succès (code 200).
Renvoir le code 500 en cas d'échec.

AUTRE REQUETE
Renvoie code d'erreur 501