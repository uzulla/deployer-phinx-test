# deployer-phinx-test

## make settings

```
$ cp sample.production.env production.env
$ cp sample.production.env production.hosts.yml
$ cp sample.production.env production.phinx.php
$ vi production.env
$ vi production.hosts.yml
```

適当に修正する

## deploy

```
$ make deploy_production
```

## add new migration

```
$ vendor/bin/phinx create MyNewMigration3
```

## apply migration

```
$ vendor/bin/phinx migrate
```

