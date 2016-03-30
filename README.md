# sql-loadPack
Use [OKFN's tabular-data-package standard JSON descriptors](http://data.okfn.org/doc/tabular-data-package) to load dataset into SQL database, and option to express fields in JSONB. Use faster internal SQL `COPY` (or `BULK INSERT`).

There are no necessary preparation, use the prefered source file in your software, eg. [src/packLoad.php](src/packLoad.php).

## Preparing examples
To illustrate packLoad use in PostgreSQL 9.5+

```
git clone https://github.com/ppKrauss/sql-loadPack.git
cd sql-loadPack
sudo nano src/packLoad.php # change $PG_PW and other database configs
php sql-loadPack/src/example.php
```

and check the `sandbox` at configurated database (`psql`  or pgAdminIII). 

## Features

* Make desired tables, defined by your standard `datapackage.json`, with one `resourceLoad_run()` instruction. 
* Any additional *pre* or *pos* database preparation can be defined by `sql_prepare()` function.
* Faster than any other conversion. 
* Optional use of JSON or JSONB datatypes, as "catch-all" fields.
* Free table names, column names, etc.
* Options `prepared_copy`, `prepare_auto`, `prepare_json`, and `prepare_jsonb`.

## User guide

Important: at your `datapackage.json`, in the `resources/schema`, as [the example](datapackage.json), add property `role` in the fields to be preserved as SQL (not encapsulating in JSON field). The default JSON field name is `jinfo`.

All that you need is exemplified by `src/example.lang`, see eg. [example.php](src/example.php).




