#CONFIGURACION LARAVEL
Instalar dependencias
`composer install`

Copiar .env.example en .env en caso que no se haya copiado solo
`cp .env.example .env`


En el .env configurar base y los siguientes
`DB_CONNECTION=mysql`
`DB_HOST=127.0.0.1`
`DB_PORT=3306`
`DB_DATABASE=luca`
`DB_USERNAME=luca`
`DB_PASSWORD=123456`

En el .env configuramos los datos de conexion a la base. Cualquier variable de ambiente nueva debe ser cargada como ejemplo en .env.example

Generar token de encriptacion

`php artisan key:generate`

Generar Token de secreto para JWT

`php artisan jwt:secret`

Correr migraciones con seed

`php artisan migrate --seed`

Va a generar un usuario de prueba y otros 10 usuarios random más. Mi intención era si tenía el tiempo hacer un pequeño login para ver cuando se genera una pregunta como se carga el usuario logueado pero no llegue con los tiempos

`admin@admin.com / Ac123456`

También generará materias y preguntas

Dejó un pequeño modelado de la solución 
`https://drive.google.com/file/d/12kLMcC5aa3tqqavQCyc1m9pN6X-bOSpd/view?usp=sharing`

Para ver las rutas disponibles de auth

`php artisan route:list`

*En caso que no reconozca alguna clase

`composer dumpautoload`

Levantar server

`php artisan serve --host=0.0.0.0 --port=8100`