<?php

require_once './api/models/libros.model.php';
require_once './api/views/api.view.php';

class ApiLibrosController {
    private $model;
    private $view;

    private $data;

    public function __construct() {
        $this->model = new LibrosModel();
        $this->view = new ApiView();

        // lee el body del request
        $this->data = file_get_contents("php://input");

    }

    private function getData() {
        return json_decode($this->data);
    }
    
    function getAll($params = null){
        $libros = $this->model->getAll();
        $this->view->response($libros, 200);
    }

    public function get($params = null) {
        //obtengo el id del arreglo de params
        $id = $params[':ID'];//si hubieramos utilizado más parametros en el ruter: 
        //$parametro1 = $params[':PARAMETRO1'];
        $libros = $this->model->get($id);

        if ($libros){
            $this->view->response($libros);
        }
        else{//si no existe devuelvo código de error 404
            $this->view->response("El libro con el id: $id no existe", 404);
        }
    }

    public function insertLibros($params = null){
        $libros = $this->getData();

        if (empty($libros->autores) || empty($libros->titulo) || empty($libros->categoria) || empty($libros->id_autor)){ 
            $this->view->response("Complete los campos obligatorios", 400);
        }
        else{
            $id = $this->model->insertLibros($libros->autores, $libros->titulo, $libros->categoria, $libros->id_autor);
            $libros = $this->model->get($id);
            $this->view->response('Se ingresaron los datos correctamente', 201);
        }
    }

    public function delete($params = null){
        $id = $params[':ID'];
        $libros = $this->model->get($id);
    if ($libros){
        $this->model->delete($id);
        $this->view->response($libros);
    }
    else{
        $this->view->response("El libro con el id:" . $id . " no existe", 404);
    }

    }

    public function editAutor($params = []){
        $id_libros = $params[':ID'];
        $libros = $this->model->get($id_libros);

        if($libros){
            $body = $this->getData();
            $autores = $body->autores;
            $titulo = $body->titulo;
            $categoria = $body->categoria;
            $id_libros = $body->id_libros;
            $autor = $this->model->editLibros($id_libros, $autores, $titulo, $categoria, $id_libros);
            $this->view->response("Libro con el id= $id_libros actualizada con éxito", 200);
        }
        else{
            $this->view->response("Book with id= $id_libros not found", 404);
        }
    }
}
