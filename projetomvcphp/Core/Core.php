<?php

class Core
{
    public function start($urlGet)
    {
        if(isset($urlGet['metodo'])) {
            $acao = $urlGet['metodo'];
        } else{
            $acao = 'index';
        }        
        if(isset($urlGet['pagina'])){
            //Identificar  a pagina que vai acessar pela url, requisição http
           $controller = ucfirst($urlGet['pagina'].'Controller');
        }else{
            $controller = 'HomeController';
        }
        

        //Verificar se a classe existe

            if (!class_exists($controller)){
                $controller = 'ErroController';
            } 
            
           if (isset($urlGet['id']) && $urlGet['id'] != null){
            $id = $urlGet['id'];
           } else  {
               $id = null;
           }


           //Chama o metodo
           call_user_func_array(array(new $controller, $acao), array('id' => $id));
    }

}
