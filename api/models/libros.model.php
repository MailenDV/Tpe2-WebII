<?php

class LibrosModel {

    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=libro; charset=utf8', 'root', '');
    }

    public function getAll() {

        $query = $this->db->prepare('SELECT libros.*, autor.autores as autor FROM libros JOIN autor ON libros.id_autor = autor.id ORDER BY autores ASC');
        $query->execute();         
        $libros = $query->fetchAll(PDO::FETCH_OBJ); // devuelve un arreglo de objetos
        
        return $libros;
    }

    public function get($id){
        $query = $this->db->prepare("SELECT * FROM libros WHERE id_libros = ?");
        $query->execute([$id]);
        $libros = $query->fetch(PDO::FETCH_OBJ);

        return $libros;
    }
    
    /*Inserta un producto en la base de datos*/
    function insertLibros($autores, $titulo, $categoria, $id_autor){
        $query = $this->db->prepare("INSERT INTO libros (autores, titulo, categoria, id_autor) VALUES ( ?, ?, ?, ?)");
        $query->execute([$autores, $titulo, $categoria, $id_autor]);      

        return $this->db->lastInsertId();
    }

    public function editLibros($id_libros, $autores, $titulo, $categoria, $id_autor) {
        $editarlibros = $this->db->prepare("UPDATE libros SET autores = ?, titulo = ?, categoria = ?, id_autor = ? WHERE id_libros=?");
        //('UPDATE products SET name_product=?, size=?, color=?, price=?, id_categorie_fk=? WHERE id_product = ?');
        $editarlibros->execute([$autores, $titulo, $categoria, $id_autor, $id_libros]); //nombre-de-la-columna = valor[, nombre-de-la-columna=valor]
        //var_dump($query->errorInfo()); // y eliminar la redireccion
        return $editarlibros;
    }

    /*Elimina un producto dado su id*/
    function delete($id_libros) {//consulta desde SQL -> DELETE FROM `products` WHERE `products`.`id_product` = 22;
        $query = $this->db->prepare('DELETE FROM libros WHERE id_libros = ?');
        $query->execute([$id_libros]);
    }

}
