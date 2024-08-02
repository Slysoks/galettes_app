# Galettes

## Description
Le projet galettes est un projet créé par [Slysoks](https://github.com/Slysoks) dans le cadre d'un
projet personnel. Le but de cette application est de permettre à des utilisateurs de commander des galettes en fonction des ingrédients définis par le chef de la crêperie.

## Installation
Ce programme utilise Docker. Pour installer le programme, il vous suffit d'installer Docker au préalable sur votre machine. Puis dans un terminal, accédez au dossier `galettes_app` et lancez la commande suivante :
```shell
docker-compose up -d
```

Notez que vous pouvez accéder à un portail `phpMyAdmin` en allant sur le port `8081` de votre machine. Pour accéder à la base de données, utilisez les identifiants suivants : utilisateur `root` et mot de passe `root`. La base de donnée s'initialise automatiquement lors du lancement du programme.

Pour accéder à l'application, il vous suffit d'aller sur le port `8080` de votre machine.

Les ports sont définis par défaut mais restent <b>modifiables</b> dans le fichier `docker-compose.yml`. Pour modifier les ports, faites attention à ne changer que le port de gauche (ex : `8080:80` &rarr; `1234:80` et non ~~`8080:1234`~~).

## Utilisation
Pour définir la liste des ingrédients, il faut aller dans la partie cuisinier, puis ajouter les ingrédients souhaités. Pour se faire, utilisez les deux premiers champs de la page. Les deux derniers sont automatiquement mis à jour en fonction des ingrédients ajoutés. Si vous souhaitez ajouter plusieurs ingréients en même temps, vous pouvez directement insérer vos ingrédients dans le champs et les séparant par un `;`, ou les insérer dans les champs du dessous. Exemple : `jambon;saumon;andouille`. Veuillez ne pas mettre d'espace avant et après les `;`. Pour terminer, cliquez sur le bouton `Valider`.

Pour le client, il suffit d'aller dans la partie dégustateur et d'entrer la commande. Pour la modifier, rien de plus simple : retournez sur la page dégustateur, réentrez votre prénom et tout est mis à jour.

## Problèmes / FAQ
En cas de problèmes ou de questions, vous pouvez toujours créer un rapport sur le repository [GitHub](https://github.com/Slysoks/galettes_app/issues).

## License
Ce projet est sous licence CC BY-NC-ND 4.0. Pour plus d'informations, veuilez consulter le fichier `LICENSE.md`.