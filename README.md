# PHP - Introduction

## Bases

### Tags d'ouverture et fermeture

Pour écrire du code PHP, on doit utiliser la balise d'ouverture `<?php`

Si on écrit du PHP dans du HTML, on doit bien séparer les sections de code PHP en les refermant avec `?>`

Exemple :

```php
//...
<body>
  <h1><?php echo "Hello world"; ?></h1>
  <?php
  $prenom = "Lucas";
  $age = 16;
  echo 'Je m\'appelle ' . $prenom;
  ?>

  <br />
//...
```

Si on écrit uniquement du PHP dans un fichier, le tag de fermeture peut être omis, et on laisse une ligne vide à la fin du fichier :

>Fichier : constants.php

```php
<?php
const AGE_MAJORITE = 18;

```

### Bases à retenir

>- Les variables commencent par le caractère `$`
>- Les instructions se terminent par un `;`
>- Les constantes ne prennent pas de `$` au début, et on les écrit en majuscules
>- On peut utiliser les guillemets doubles `"` ou simples `'` pour délimiter une chaîne de caractères
>- Le caractère d'échappement dans une chaîne est l'anti-slash `\`
>- Quand on utilise des guillemets doubles, on peut directement insérer des variables dans la chaîne, sans les concaténer
>- L'opérateur de concaténation de chaîne en PHP est le point `.`

## Fonctions

Une fonction peut permettre d'isoler une ou plusieurs instructions et de lui donner un nom.

On peut ensuite rappeler ce bloc de code grâce à son nom. On appelle ça une fonction.

La fonction peut ensuite être utilisée dans autant d'endroits de l'application que nécessaire.

>Fichier : functions.php

```php
<?php
function majeur(int $age): bool
{
  return $age >= AGE_MAJORITE;
}

```

Une fonction a ce qu'on appelle une **signature**. Il s'agit de son nom, la liste de ses paramètres (et leurs types), et son type de retour.

Uniquement en prenant connaissance de la signature de la fonction `majeur`, on sait qu'elle prend en paramètre un entier, et qu'elle doit renvoyer un booléen.

On peut également documenter notre fonction avec l'extension VSCode [PHPDocBlocker](https://marketplace.visualstudio.com/items?itemName=neilbrayfield.php-docblocker) :

>Fichier : functions.php

```php
<?php
/**
 * Retourne vrai si l'âge est au-dessus de la majorité
 *
 * @param integer $age
 * @return boolean
 */
function majeur(int $age): bool
{
  return $age >= AGE_MAJORITE;
}

```

L'avantage est ensuite de pouvoir utiliser cette fonction dans une autre partie de notre application :

>Fichier : test.php

```php
<?php
$age = 16;

if (majeur($age)) {
  echo "Je suis majeur";
}
```

Le code est donc plus court et plus lisible.

Par ailleurs, on a centralisé la logique de vérification de majorité à partir d'un âge dans un endroit unique de l'application : la fonction `majeur`.

## Formulaires

Quand on fait un formulaire qu'on veut exploiter avec PHP, on peut utiliser 2 méthodes HTTP : **GET** ou **POST**.

### Méthode GET et méthode POST

>Fichier : forms/newsletter.php

```html
<div style="margin-top: 2em;">
  <form action="newsletter.php"> <!-- méthode par défaut : GET -->
    <label for="email">Enregistrez votre adresse email dans notre newsletter :</label>
    <br />
    <input required type="email" name="email" id="email" placeholder="Email..." />
    <input type="submit" value="Enregistrer" />
  </form>
</div>
```

Dans le code ci-dessus, on aurait pu écrire pour la balise `form` :

```html
<form action="newsletter.php" method="GET">
```

>Un formulaire a toujours une "cible" : un fichier auquel on envoie les données de formulaire. Cette cible peut être définie avec l'attribut `action` de la balise `form`. Si l'attribut `action` n'est pas spécifié, alors la cible par défaut est le fichier courant

Quand on utilise la méthode GET pour un formulaire, les champs du formulaire sont mappés dans l'URL sous forme de **paramètres GET**.

Exemple :

```txt
http://localhost/ynov-b1-2019-2020/newsletter.php?email=test%40gmail.com
```

Nous avons ici un paramètre GET, email, qui a la valeur "test@gmail.com". La valeur est encodée pour pouvoir être intégrée à l'URL, c'est pour ça qu'on a `%40` à la place du `@`.

PHP récupère les paramètres GET, donc les paramètres d'URL, dans un tableau superglobal `$_GET`.

#### Variables superglobales

L'essentiel à retenir sur les variables superglobales est qu'il s'agit de variables **internes et réservées à PHP**, qui ont chacune un rôle suivant le scénario que l'on souhaite réaliser.

Plus d'infos sur les variables superglobales [sur cette page](https://www.php.net/manual/fr/language.variables.superglobals.php).

---

Ici, dans le cas d'un formulaire utilisant la méthode GET, la variable superglobale qui nous intéresse est donc `$_GET`, un tableau.

Si on utilisait la méthode POST, on aurait spécifié `method="POST"` dans la balise form et on aurait utilisé le tableau `$_POST` dans notre script PHP.

>La différence entre la méthode `GET` et la méthode `POST` est la manière de passer les champs de formulaire : `GET` va passer les champs de formulaire dans l'URL, alors que `POST` les passe dans le corps de la requête

Dans un fichier cible d'un formulaire, on peut donc utiliser, suivant le cas :

```php
echo $_GET['email'];
```

ou

```php
echo "Mot de passe : " . $_POST['password'];
```

### Validation

Il est important, quand on utilise un formulaire, de s'assurer de la validité des données **côté client ET côté serveur**.

Je peux décomposer la validation en 2 étapes : existence (si requis) et format.

Par exemple, pour notre formulaire de newsletter, on est le champ email est bel et bien requis. Une soumission de formulaire de newsletter sans email n'aurait aucun sens.

Par ailleurs, on doit s'assurer qu'il s'agit bien d'un email.

On peut donc écrire :

```php
if (isset($_GET['email']) && filter_var($_GET['email'], FILTER_VALIDATE_EMAIL)) {
  echo $_GET['email'];
} else {
  echo "L'email est obligatoire, si vous l'avez renseigné, merci de vérifier son format.";
}
```
