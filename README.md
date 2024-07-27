# Galettes

## Description
Le projet galettes est un projet créé par [Slysoks](https://github.com/Slysoks) dans le cadre d'un
projet personnel. Le but de cette application est de permettre à des utilisateurs de commander des galettes en fonction des ingrédients définis par le chef de la crêperie.

## Installation
Ce programme utilise Docker. Pour installer le programme, il vous suffit d'installer Docker au préalable sur votre machine, puis de lancer l'application en lançant dans un terminal :
```shell
docker-compose up -d
```

## Utilisation
Pour définir la liste des ingrédients, il faut aller dans la partie cuisinier, puis ajouter les ingrédients souhaités. Pour se faire, utilisez les deux premiers champs de la page. Les deux derniers sont automatiquement mis à jour en fonction des ingrédients ajoutés. Si vous souhaitez ajouter plusieurs ingréients en même temps, vous pouvez directement insérer vos ingrédients dans le champs et les séparant par un `;`, ou les insérer dans les champs du dessous. Exemple : `jambon;saumon;andouille`. Veuillez ne pas mettre d'espace avant et après les `;`.

Pour le client, il suffit d'aller dans la partie dégustateur et d'entrer la commande. Pour la modifier, rien de plus simple : retournez sur la page dégustateur, réentrez votre prénom et tout est mis à jour.

## Problèmes / FAQ
En cas de problèmes ou de questions, vous pouvez toujours créer un rapport sur le repository [GitHub](https://github.com/Slysoks/cuisine/issues).

Ce projet est sous license CC BY-NC-SA 4.0. Vous pouvez retrouver les informations sur la license [ici](https://creativecommons.org/licenses/by-nc-sa/4.0/). Ce projet est donc protégé par cette license et vous ne pouvez pas le modifier, le distribuer ou le vendre sans mon accord.