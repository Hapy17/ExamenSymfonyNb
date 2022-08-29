# Squelette de projet Symfony
## Sommaire 

  - [Plusieurs manière de récupérer le Squelette de projet Symfony <a name="getRepository"></a>](#plusieurs-manière-de-récupérer-le-squelette-de-projet-symfony-)
    - [- Cloner le Repos directement en local](#--cloner-le-repos-directement-en-local)
    - [- Utilisez le template du squelette(RECOMMANDEE)](#--utilisez-le-template-du-squelette)
  - [Initalisation du projet squelette Symfony](#initalisation-du-projet-squelette-symfony)
  
---  
---
## Plusieurs manière de récupérer le Squelette de projet Symfony <a name="getRepository"></a>
Il y a plusieurs manière de récupérer le squelette de projet Symfony:  
    
### - Cloner le Repos directement en local 
Il est possible de cloner le squelette de projet Symfony directement en local avec la commande : 
```
git clone https://github.com/Hapy17/skeletonSymfony.git
```    
---
### - Utilisez le template du squelette (RECOMMANDEE)
Il est aussi possible d'utiliser le template du squelette de projet Symfony en cliquant sur le bouton bleu 'Use this template' :  
![Bouton use the template!](/assets/img/md/ButtonUseThisTemplate.png "Bouton use the template!")  
Choisissez l'utilisateur, le nom du repository et remplissez le reste de options ou laissez les valeurs par défaut.  
  
![Formulaire userTemplate](/assets/img/md/template2.png "Formulaire userTemplate")
  
---
---  
## Initalisation du projet squelette Symfony
Une fois le dossier squeletteSymfony est installer sur votre machine, vous devez executer certaines commandes pour finir de mettre en place et initialiser le projet sur votre machine.  
* La première commande est la commande :
  ```
  symfony composer install
  ```
* La seconde commande est la commande :
  ```
  yarn install
  ```  
  
Une fois ces deux commandes executées, vous pouvez commencer à utiliser le squelette de projet Symfony.  
Lancez les commandes suivantes :  
```
symofony serve
```
et
```
yarn watch
```  
Vous pouvez maintenant accéder à l'adresse  http://127.0.0.1:8000, si la page affiche bien l'accueil de Symofony, alors tout est ok.
