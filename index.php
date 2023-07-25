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

<?php
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
?>
  
  <script src="https://replit.com/public/js/replit-badge-v2.js" theme="dark" position="bottom-right"></script>
  </body>
</html>