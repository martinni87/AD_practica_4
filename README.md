# PRACTICA 4.1 ACCESO A DATOS Y DESARROLLO DE INTERFACES

* Práctica del Ciclo Formativo de Grado Superior en Desarrollo de Aplicaciones Multiplataforma.
* Curso 2022 - 2023
* Alumno: Martín Antonio Córdoba Getar

## Descripción de la práctica
El objetivo de la práctica es montar un CRUD con PHP sobre la base de datos "hospital.sql":
* CREATE
* READ
* UPDATE
* DELETE

En esta práctica se siguen los principios de la POO en PHP creando **modelos de objetos** que irán relacionados con sus respectivas tablas de MySQL, como:
* Medico.php -> relacionado con la tabla médicos
* Paciente.php -> relacionado con la tabla pacientes
* Cita.php -> relacionado con la tabla citas

Estos modelos incluirán todos los atributos y métodos correspondientes a cada tabla de SQL.

Además, se crean también **servicios web** para programar la lógida de negocio:
* sw_medico.php
* sw_paciente.php
* sw_cita.php

## Estructura de carpetas

* **models/**: contendrá las clases de los objetos Medico, Paciente y Cita.
* **inc/**: archivos conf.inc.php o auth.inc.php
* **/**: directorio raíz donde irán los servicios web sw_medico, sw_paciente, sw_cita.

## Estructura de archivos

* **conf.inc.php**: archivo de parámetros de la BD no sincronizado con git.
* **conf.inc.php.example**: clon de conf.inc.php para sincronizar con git.
* **Medico.php** clase Model/Controller para la tabla médico de la BD (idem resto de modelos).
* **DBSingleton.php**: clase singleton para facilitar las conexiones a la BD.
* **sw_medico.php**: servicio web que recibirá las acciones tipo insert, update, delete, etc. Opera utilizando la clase Medico y sólo retorna JSON.

## Formato de comunicación de petición desde el servicio web
Se realiza mediante Ajax.

Ejemplo de INSERT en JSON:
```json
data: {
    "action": "insert",
    "data": {
        "nombre":"Martin",
        "apellido_1": "Cordoba",
        "localidad": "Jacarilla",
    },
}
```

Ejemplo de GET (petición) en JSON:
```json
data: {
    "action": "get",
    "filters": {
        "nombre": "Martin",
        "localidad": "Orihuela",
    },
    "orders": {
        "nombre":"desc",
        "localidad": "desc",
    },
    "paginated": true,
    "page": 2,
    "rows_per_page": 10,
}
```

## Formato de comunicación de respuesta del servicio web
Se realiza mediante Ajax.

Estructura de respuesta en JSON:
```json
{
    "success": true,
    "msg": "Listado de medicos",
    "data": [
        {"nombre": "Martin", "apellido_1": "Cordoba", "localidad": "Orihuela",},
        {"nombre": "Juan", "apellido_1": "De la Cruz", "localidad": "Cordoba",},
    ],
    "paginated": true,
    "page": 1,
    "total_rows": 25,
    "rows_per_page": 2,
}
```

* **Success**: indica si la respuesta es correcta o no.
* **msg**: devuelve el mensaje de respuesta de la operación.
* **data**: contiene toda la información a devolver. Por ejemplo un array de personas con sus datos.
* **paginated**: indica si el resultado se quiere o no paginado.
* **page**: indica la página que se quiere para el listado.
* **total_rows**: indica el número total de registros.
* **rows_per_page**: indica el número de registros por cada página.

## IMPORTANTE A TENER EN CUENTA
* Los métodos de las clases modelo jamás harán echo, print, o similares. Solo devolverán resultados con return. Los servicios web procesan los return de las clases modelo y devuelven JSON.
* Se utiliza try/catch para la gestión de errores y se escalan los erroers al servicio web para ser tratados.