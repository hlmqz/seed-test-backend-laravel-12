
# Prueba Técnica

Repositorio realizado como prueba técnica para Seed EM.

## Ejercicio

### API REST con Laravel
**Objetivos:** 

- Crear una API básica para la gestión de productos.
- Crea un CRUD para productos con los campos: nombre, precio, descripción,
activo.
- Agrega autenticación con Laravel Sanctum.
- Protege las rutas del CRUD para que solo usuarios autenticados puedan acceder.
- Incluye pruebas automatizadas (al menos una para crear y otra para listar
productos).

## Requerimientos de implementación

- Composer.
- PHP 8.3 como mínimo.
- Base de datos PostgreSQL de preferencia.

## Instrucciones de Instalación

- clonar el repositorio.
- las siguientes instrucciones se realizan en el directorio del proyecto.
- copiar el archivo `.env.production-example` *(para producción)* ó `.env.dev` *(para desarrollo)*
en el archivo `.env` y reemplazar los valores de conexión a la base de datos, de preferencia PostgreSQL.
- ejecutar el comando `composer install` para instalar dependencias.
- ejecutar el comando `php artisan key:generate` para generar la llave secreta de encriptaciones.
- servir el aplicativo según requerimiento, a desarrollo o produccion.
- en caso de ser producción, validar los valores en el .env correspondientes al dominio a usar.
- en la base datos cree un registro de usuario con los valores que crea pertinente.

Fin.
