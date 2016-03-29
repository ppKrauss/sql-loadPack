<?php
/**
 * Load CSV data (defined in datapackage.jsob) to the SQL database.
 * php src/php/prepare.php
 */

include 'packLoad.php';  // must be CONFIGURED for your database

// // // // // // // // // //
// CONFIGS: (complement to omLib)
	$basePath = realpath(__DIR__ .'/..');
	$reini = true;  // re-init all SQL structures of the project (drop and refresh schema)


// // // // //
// SQL PREPARE
$sqlIni   = [
  "DROP SCHEMA if exists sandbox CASCADE;  CREATE SCHEMA sandbox;",
  "CREATE TABLE sandbox.ex1a (term text);",
	"CREATE TABLE sandbox.ex1b (id serial PRIMARY KEY NOT NULL, term text, info int DEFAULT 1);",
];

$resourceLoad_instructions = [
	'example1'=>[
      ['prepared_copy', "sandbox.ex1a"],
      ['prepared_copy', "sandbox.ex1b(term)"],
      ['prepare_auto', "sandbox.ex1c"],
  ],
  'example3'=>[
      ['prepare_json', "sandbox.ex3"],
      //['prepare_jsonb', "sandbox.ex3jb"],
  ],
  'population'=>[
      ['prepare_jsonb', "sandbox.pop"],
  ],
]; // itens of each resource defined in the datapackage.


// // // // //
// MAKING DATA:

resourceLoad_pre($sqlIni, "SQL SCHEMAS", $reini);

resourceLoad_run($basePath, $resourceLoad_instructions, "(tests)");

// resourceLoad_pos($sqlFinal);

print "\nEND\n";
?>
