# LIBROS Server Side
Lista de libros renderizada desde el servidor.

## Importar la base de datos
- importar desde PHPMyAdmin (o cualquiera) database/libro.php

## DESCRIPCION
- Esta es una API RESTful vinculada a la base de datos de libros, detallando todos los libros disponibles.

## URI
- Accesible mediante la dirección web http://localhost/Tpe2-WebII-Mai/api/libros

- Opcionalmente se puede especificar a continuación el id de un recurso en particular con el siguiente formato: http://localhost/Tpe2-WebII-Mai/api/libros/id

## PARAMETROS
- El parámetro disponible para acceder a la consulta de la API es el siguiente:

- orderBy que indica que los resultados serán visualizados de forma ordenada por el campo que sea especifico. Se debe ingresar en formato minúsculas y coincidir exactamente con el nombre de una columna de la tabla del recurso en la base de datos. De lo contrario la consulta arroja un error. Por defecto, los resultados se muestran ordenados alfabéticamente por la denominación del autores.

## CONSUMO DE LA API
- Están disponibles para su utilización en esta API los métodos GET y POST.

### Metodo GET
- Al consultar los recursos con el método GET, obtendrá la siguiente información detallada de cada uno de ellos:

    {
        "id_libros": 10,
        "autores": "Alex Mirez",
        "titulo": "Damian",
        "categoria": "Literatura Juvenil",
        "fecha": "2022",
        "precio": "$8060",
        "id_autor": 2,
        "autor": "Alex Mirez"
    }

Ejemplo de una consulta GET sobre el recurso libros con id = 25

{
    "id_libros": 25,
    "autores": "Sebastian Fitzek",
    "titulo": "Terapia",
    "categoria": "Thriller/Suspense",
    "fecha": "2006",
    "precio": "$3100",
    "id_autor": 6
}

### Metodo POST
- Para realizar una inserción de elemento con el método POST, se debe especificar la siguiente información en formato JSON, según el recurso correspondiente:

{
    "id_libros": 25,
    "autores": "Sebastian Fitzek",
    "titulo": "Terapia",
    "categoria": "Thriller/Suspense",
    "fecha": "2006",
    "precio": "$3100",
    "id_autor": 6
}   

## RESULTADOS / ERRORES
Al finalizar una transacción con la API exitosamente, la misma devuelve el registro creado/modificado/ o una colección de registros según corresponda.

Ejemplo de error en la consulta:

Código de respuesta 404: "El libro con el id 29 no existe"