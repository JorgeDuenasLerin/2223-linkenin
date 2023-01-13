# 2223-linkenin

Esta aplicación permite el registro de usuarios, estos luego podrán recuperar su contraseña. Editar su perfil, etc.

## Instalación

Crear base de datos

```
CREATE DATABASE linkenin;
CREATE USER 'linkenin'@'localhost' IDENTIFIED BY 'linkenin';
GRANT ALL PRIVILEGES ON linkenin.* TO 'linkenin'@'localhost' WITH GRANT OPTION;
```

Comenzar aplicación en limpio
```
mysql -u linkenin -p linkenin < scripts/db.create.sql
```

Cargar ejemplos
```
mysql -u linkenin -p linkenin < scripts/db.ejemplos.sql
```

## Ejecutar servidor dev

```
./rundevserver.sh 8000
```

## Librerías

Instalar [composer](https://getcomposer.org/download/)

```
composer install phpmailer/phpmailer
```
