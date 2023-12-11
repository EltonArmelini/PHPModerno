# Manejo de Tecnicas y Herramientas del PHP Moderno

---

- >composer init:
      es un comando de composer que nos genera el composer.json, que es un archivo que tiene info del proyecto, como dependencias,licencia, autor,autoload, etc.
- >composer install: 
      con este comando se ejecutara el **comperser.json**, y nos permitira installar las dependecia y demas, en este caso se utilizo el autoload de archivos, para automatizar el require dentro de nuestros archivos del proyecto
- >composer dump-autoload: 
      con este comando regeneramos los archivos dentro de vendor, se utilza cuando agreamos nuevos archivos y necesitamos que estos se agreguen en el auto load
- >extract($params): 
      esta funcion se comporta de la manera en la que nosotros pasamos un array asociativo, y creara las variables de la manera ["nombreVariable"=>"valor"]
- >*Aclaracion* Las variables de las clases en PHP tiene scope local
- >namespace App\FolderName
      con los namespace nos permite agrupar las clases dentro de carpetas, de esta manera podemos tener varias clases con el mismo nombre, pero estas al tener un namespace distinto no genera colisiones
- >*Con autoload psr-4 usando namespace no es necesario usar el comando de **composer dump-autoload** ya que asignando ahora solamente necesitamos asignar y usar el namespace especificado*
- >composer require packegename
      con este comando instalmos un paquete o dependecia en nuestro proyecto, podemos sacar paquetes de la pagina oficial que es: https://packagist.org/
- >con **illuminate/database** hacemos todo el manejo de base de datos y modelos, conexion,consultas,insercciones,ORM

 