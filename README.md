# sql-loadPack
Use [OKFN's tabular-data-package standard JSON descriptors](http://data.okfn.org/doc/tabular-data-package) to load dataset into SQL database.

There are no necessary preparation, use the prefered source file in your software, eg. [src/packLoad.php](src/packLoad.php).

## preparing examples
To illustrate packLoad use in PostgreSQL 9.5+

```
git clone https://github.com/ppKrauss/sql-loadPack.git
cd sql-loadPack
sudo nano src/packLoad.php # change $PG_PW and other database configs
php sql-loadPack/src/example.php
```

and check the `sandbox` at configurated database (`psql`  or pgAdminIII). 

