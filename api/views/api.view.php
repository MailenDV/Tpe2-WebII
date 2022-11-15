<?php

class ApiView {
    
    public function response($data, $code = 200) {//parámetro con valores por defecto. Dice: si se llama a la función sin el parámetro $code, ponele un 200
        header("Content-Type: application/json");
        header("HTTP/1.1 " . $code . " " . $this->requestStatus($code));
        
        //convierto los datos a json
        echo json_encode($data);
    }

    private function requestStatus($code){//devuelve el texto asociado a un código de respuesta
        $status = array(//arreglo asociativo para no escribir tantos if, es como hacer un case
            200 => "OK",
            201 => "Created",
            400 => "Bad Request",
            404 => "Not Found",
            500 => "Internal Server Error"
        );
        return (isset($status[$code])) ? $status[$code] : $status[500];
    }

    /*

    function showEdit($id_product) {
        
        // asigno variables al tpl smarty
        // $this->smarty->assign('count', count($productos)); 
        $this->smarty->assign('id_product', $id_product);

        // mostrar el tpl
        $this->smarty->display('form_edit_product.tpl');
    }

    function printEdit($editarproductos, $productos) {
        // asigno variables al tpl smarty
        $this->smarty->assign('count', count($productos));
        $this->smarty->assign('editarproductos', $editarproductos);
        $this->smarty->assign('productos', $productos);

        // mostrar el tpl
        $this->smarty->display('productList.tpl');
    }

    function showError($message){
        echo "<h1>ERROR!</h1>";
        echo "<h2>$message</h2>";
    }
*/
   
}