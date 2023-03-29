# educonecta
Proyecto de tesis.
Cristhian Hurtado
Omar Moreno

# Configuración del ambiente
    Para configurar el ambiente, debemos tener en encuenta haber instalado XAMPP y configurar el archivo .env (Este archivo no se carga a GIT)
    instrucciones en este video de youtube https://www.youtube.com/watch?v=p3losLFA0aQ&
# Tener en cuenta los siguientes comandos para ejecutar en el proyecto
    1. Crear proyecto en laravel
        composer create-project laravel/laravel <project-name>
    2. Crear tabla en base de datos
        php artisan make:migration <table-name>
    3. Subir tablas creadas a la base de datos
        php artisan migrate
    4. Refrescar la base de datos (TENER EN CUENTA QUE ESTE COMANDO ELIMINARÁ Y VOLVERÁ A CREAR LA BASE DE DATOS)
        php artisan migrate:refresh
# Proceso para cargar la autenticación
    compose require laravel/ui -> Interfaz gráfica de laravel
    php artisan ui bootstrap --auth -> instalar la interfaz de autenticación de laravel
    npm install && npm run dev -> para finalizar
    npm run dev -> Permitirá ejecutar de forma local el proyecto