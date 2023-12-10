# Manejo de Tecnicas y Herramientas del PHP Moderno

---

- > composer init
      es un comando de composer que nos genera el composer.json, que es un archivo que tiene info del proyecto, como dependencias,licencia, autor,autoload, etc.
- > composer install
      con este comando se ejecutara el **comperser.json**, y nos permitira installar las dependecia y demas, en este caso se utilizo el autoload de archivos, para automatizar el require dentro de nuestros archivos del proyecto
- > composer dump-autoload
      con este comando regeneramos los archivos dentro de vendor, se utilza cuando agreamos nuevos archivos y necesitamos que estos se agreguen en el auto load
