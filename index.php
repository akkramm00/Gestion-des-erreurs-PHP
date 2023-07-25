<html>
  <head>
    <title>PHP Test</title>
  </head>
  <body>
<?php
// la gestion des erreurs localemnent :
try {
	require 'foo.php';
	echo 'Cette instruction ne sera pas executée si require émet une erreur' . PHP_EOL;
} catch (Error $e) {
	echo "L'erreur " . $e->getMessage() . " est gérée localement" . PHP_EOL;
}
echo 'Le programme continue ici' . PHP_EOL;

// Attraper l'erreur un oeu olus haut:


/**
* Charge un modèle (la classe Foo), mais foo.php n'existe pas
* @throws Error - Si le fichier foo.php n'arrive pas à être lu
*/
function loadLModelFoo()
{
	require 'foo.php';
}

/**
* Charge un modèle (la classe Bar), mais bar.php n'existe pas
* @throws Error - Si le fichier bar.php n'arrive pas à être lu
*/
function loadLModelFoo()
{
	require 'bar.php';
}

/**
* Charge les modèles
* @throws Error - Si un modèle ne peut pas être chargé
*/
function loadModels()
{
	loadLModelFoo();
	loadLModelBar();
}

try {
	loadModels();
	echo 'Cette instruction ne sera pas exécutée si require émet une erreur' . PHP_EOL;
} catch (Error $e) {
	echo "L'erreur " . $e->getMessage() . " est gérée localement" . PHP_EOL;
}
echo 'Le programme continue ici' . PHP_EOL;

// On peut déclarer un gestionnaire d'erreurs global pour gérer globalement les erreurs émises par nos fonctions PHP. Un gestionnaire d'erreurs global se déclare avec la fonction PHP set_error_handler($callable $callback, int $error_levels): ?callable. 

  //Il vous permet de personnaliser la génération de vos rapports en enregistrant une fonction $callback. Cette fonction sera appelée lorsqu’une erreur sera émise dans votre code. Vous pouvez ainsi, comme dans les blocs catch, exécuter du code personnalisé (par exemple, envoyer un e-mail à l'administrateur du site, puis tuer le programme).
/**
* Définition du gestionnaire d'erreurs global
*/
set_error_handler(function ($errno, $errstr, $errfile, $errline) {
	echo "Nous sommes désolés, un problème vient de survenir :/ \nNous vous invitons à revenir plus tard." . PHP_EOL;
//Si c'est une erreur de niveau 2 (avertissement), l’exécution peut en principe continuer
// mais on décide, par précaution, d'arrêter là les frais
	if ($errno === E_WARNING)
		die;
});

require 'foo.php';
echo 'Tout va bien' . PHP_EOL;
?>
  
  <script src="https://replit.com/public/js/replit-badge-v2.js" theme="dark" position="bottom-right"></script>
  </body>
</html>