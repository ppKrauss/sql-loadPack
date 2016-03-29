<?php
/**
 * Load CSV data (defined in datapackage.jsob) to the SQL database.
 * php src/php/prepare.php
 */

include 'packLoad.php';  // must be CONFIGURED for your database

// // // // // // // // // //
// CONFIGS: (complement to omLib)
  $sqlMode = '1';
	$basePath = realpath(__DIR__ .'/../..');
	$reini = true;  // re-init all SQL structures of the project (drop and refresh schema)


// // // // //
// SQL PREPARE
$sqlIni   = [
	"DROP TABLE if exists lixoterm.term;  CREATE TABLE lixoterm.term (term text);",
];

$resourceLoad_instructions = [
	'test'=>['prepared_copy', "lixoterm.term"],
]; // itens of each resource defined in the datapackage.


// // // //
// INITS:

resourceLoad_pre($sqlIni, "SQL SCHEMAS with MODE$sqlMode", $reini);

resourceLoad_run($basePath, $resourceLoad_instructions, "(MODE$sqlMode)");

// resourceLoad_pos($sqlFinal);

print "\nEND\n";


?>
