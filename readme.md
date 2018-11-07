<h2 align="center">Sistema de Conteo de Votos</h2>

El siguiente sistema es un sistema web para el registro y conteo del votos realizados por cualquier tipo de elecciones como ser:

- Elecciones universitarias (Rector, Vicerector, Decano y Directores)
- Elecciones Departamentales (Alcalde, Gobernador, etc.)
- Otro tipo de elecciones

### Modulos del Sistema
El sistema cuenta con los siguientes modulos:

1. **Modulo de Usuarios:** Aqui se registraran todos los usuarios que necesiten cargar los datos al sistema.
2. **Modulo de Registro:** Aqui se registrar los votos de los candidatos de una mesa de un recinto buscado previamente.
3. **Modulo de Reportes:** Aqui se visualizar un reporte estadistico global de los votos de los candidatos.
4. **Modulo de Configuraciones:** Aqui se realizar las configuraciones necesarios para que funcione el sistema, es  son los siguientes:
    - *Tipo de Eleccion:* Registro de tipo de eleccion(Ej. Rector, Vicerector, etc.)
    - *Candidatos:* Registro de todos los candidatos que se postulan a un tipo de eleccion (Crear los candidatos Votos Blancos, Votos Nulos)
    - *Recintos:* Registro de los Recientos donde se pueden votar, el sistema contiene una funciona de importacion recintos a traves de un archivo excel
    - *Mesas:* Registro de Numero de mesas por Recinto donde se puede votar

### Instalacion Linux
Para instalar el sistema debe descargar el projecto y descomprimirlo en la ubicacion correspondiente de sus servidor apache

> Por defecto esta ubicacion esta en `var/www/html`

Se debe dar permision a las siguientes carpetas `storage` `bootstrap/cache` con el comando

```shell
sudo chmod 777 -R storage/
sudo chmod 777 -R bootstrap/cache
```

**Configuracion del archivo `.env` y la base de datos**
Se debe modificar los siguiente datos del archivo `.env`

```php
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=[nombreBaseDeDatos]
DB_USERNAME=[usuario]
DB_PASSWORD=[password]
```
> **[nombreBaseDeDatos].-** Es el nombre de tu base de datos creado para tu coneccion de mysql
**[usuario].-** Es el usuario para conectarte a tu mysql por defecto es `root`
**[password].-** Es tu contraseña para conectarte a tu mysql


Antes de ingresar al sistema debe ejecutar las respectivas migraciones y el seeder inicial con el comando:

```shell
php artisan migrate:refresh --seed
```

Una vez ejectutados las migraciones y el seeder inicial para ingresar al sistema debe abrir un navegador web y escribir el siguiente enlace:  [http://localhost/sisvotos/public](http://localhost/sisvotos/public)

**Usuarios por defecto en el sistema**
Nombre Usuario | Password | Rol
:---:|:---:|:---:
admin| S1st3m4s|**admin**
encargado1|123456|**encargado**
