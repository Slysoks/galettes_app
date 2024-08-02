# Galettes

## Description
Le projet galettes est un projet créé par [Slysoks](https://github.com/Slysoks) dans le cadre d'un
projet personnel. Le but de cette application est de permettre à des utilisateurs de commander des galettes en fonction des ingrédients définis par le chef de la crêperie.

## Installation
Ce programme utilise Docker. Pour installer le programme, il vous suffit d'installer Docker au préalable sur votre machine. Puis dans un terminal, accédez au dossier `galettes_app` et lancez la commande suivante :
```shell
docker-compose up -d
```

Si c'est la toute première fois que vous utilisez ce programme, il vous faudra créer la base de données. Pour ce faire, ouvrez sur un navigateur `phpMyAdmin` en allant sur `localhost:8081` (par défaut) et en vous connectant avec les identifiants suivants : mot de passe `root`, utilisateur `root`. Créez une base de données nommée `cuisine` et importez le fichier `init.sql` dans cette base de données.

## Utilisation
Pour définir la liste des ingrédients, il faut aller dans la partie cuisinier, puis ajouter les ingrédients souhaités. Pour se faire, utilisez les deux premiers champs de la page. Les deux derniers sont automatiquement mis à jour en fonction des ingrédients ajoutés. Si vous souhaitez ajouter plusieurs ingréients en même temps, vous pouvez directement insérer vos ingrédients dans le champs et les séparant par un `;`, ou les insérer dans les champs du dessous. Exemple : `jambon;saumon;andouille`. Veuillez ne pas mettre d'espace avant et après les `;`. Pour terminer, cliquez sur le bouton `Valider`.

Pour le client, il suffit d'aller dans la partie dégustateur et d'entrer la commande. Pour la modifier, rien de plus simple : retournez sur la page dégustateur, réentrez votre prénom et tout est mis à jour.

## Problèmes / FAQ
En cas de problèmes ou de questions, vous pouvez toujours créer un rapport sur le repository [GitHub](https://github.com/Slysoks/galettes_app/issues).

## License
Ce projet est sous licence CC BY-NC-ND 4.0. Pour plus d'informations, veuilez consulter le fichier `LICENSE.md`.