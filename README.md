## Configuración del Proyecto

Siga estos pasos para configurar y ejecutar el proyecto "Talent":

1. **Crear la Base de Datos**: Cree una base de datos llamada `talent` en su sistema de gestión de bases de datos preferido.

2. **Configurar la Conexión a la Base de Datos**: En el archivo `app/Config/Database.php`, configure la conexión a la base de datos según la configuración de su entorno.

    ```php
    public $default = [
        'DSN'      => '',
        'hostname' => 'localhost',
        'username' => 'root',
        'password' => '',
        'database' => 'talent',
        'DBDriver' => 'MySQLi',
        // Otros ajustes de configuración...
    ];
    ```

3. **Instalar Dependencias**: Ejecute el siguiente comando en la raíz del proyecto para instalar las dependencias necesarias:

    ```bash
    composer install
    ```

4. **Ejecutar Migraciones**: Ejecute las migraciones para crear las tablas necesarias en la base de datos:

    ```bash
    php spark migrate
    ```

5. **Sembrar Roles**: Ejecute el seeder para insertar los roles predeterminados en la base de datos:

    ```bash
    php spark db:seed RolesSeeder
    ```

6. **Iniciar el Servidor de Desarrollo**: Para ejecutar el proyecto, inicie el servidor de desarrollo:

    ```bash
    php spark serve
    ```

    Esto iniciará el servidor en `http://localhost:8080` por defecto.
