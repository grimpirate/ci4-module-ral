# Raw Access Log
Raw Access Log CLI

## Setup
~
```
git clone --depth 1 --branch main --single-branch https://github.com/grimpirate/ci4-module-ral
mv ci4-module-ral/modules .
rm -rf ci4-module-ral
```
app/Config/Autoload.php
```
public $psr4 = [
    'Modules\RawAccessLog' => ROOTPATH . 'modules/RawAccessLog',
];
```
app/Config/Database.php
```
public array $logs = [
    'database'    => 'logs.db',
    'DBDriver'    => 'SQLite3',
];
```
~
```
php spark db:create logs --ext db
php spark migrate -n Modules\\RawAccessLog -g logs

chown -R apache:apache logs.db
```