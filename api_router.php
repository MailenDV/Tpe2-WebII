<?php
require_once './libs/router.php';
require_once './api/controllers/api_libros.controller.php';

// crea el router
$router = new Router();

// define la tabla de ruteo
$router->addRoute('libros', 'GET', 'ApiLibrosController', 'getAll');//recurso, verbo, controlador, método
$router->addRoute('libros/:ID', 'GET', 'ApiLibrosController', 'get');//los : indican que este endpoint tiene un parametro. Los : quiere decir que lo que sigue es reemplazable por un valor de verdad, si no lo tomaría como un string
//el recurso siempre en plural. Si no se estaría rompiendo la interfaz unificada (RestFull)
//si tenemos varios parámetros en la URL, en el recurso debería poner de la siguiente manera: 'productos/:ID/:PARAMETRO2/:PARAMETRO3' . Se puede poner la cantidad que necesito
$router->addRoute('libros/:ID', 'DELETE', 'ApiLibrosController', 'delete');
$router->addRoute('libros', 'POST', 'ApiLibrosController', 'insertLibros');//agregar un producto
$router->addRoute('libros/:ID', 'PUT', 'ApiLibrosController', 'editLibros');//modificar un producto


// rutea - nuestro ruter le manda al controlador la lista de parámetros en formato de un arreglo asociatio. Entonces siempre que haga un método del controlador que es llamado desde nuestro ruter, le tengo que agregar la lista de parámetros poniendole por defecto null por si la mandé vacía. Esto me permite acceder al parámetro con el mismo identificador que le puse en la ruta
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);
//$resource = $_GET['resource'];
//$method = $_SERVER ['REQUEST_METHOD'];
//$router = route($resource, $method);