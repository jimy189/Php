<?php

    class PostController
    {
            public function index($params)
            {
                try{
                    $postagem = Postagem::selecionaPorId($params);
                   
                    //var_dump($postagem);

                    $loader = new \Twig\Loader\FilesystemLoader('View');
                    $twig = new \Twig\Environment($loader);
                    $template = $twig->load('single.html');

                    //var_dump($postagem);
                    $parametros = array();
                    $parametros['id'] = $postagem->id;
                    $parametros['titulo'] = $postagem->titulo;
                    $parametros['conteudo'] = $postagem->conteudo;
                    $parametros['comentarios'] = $postagem->comentarios;

                    //Ele manda via twig o dado para o html
                   // $parametros['nome'] = 'Renato Marcelo';

                    $conteudo = $template->render($parametros);
                    echo $conteudo;

                                          
                } catch (Exception $e){
                    echo $e->getMessage();
                }                             
                
            }

            public function  addComent()
            {
                try{
                    Comentario::inserir($_POST);

                    header('Location: http://localhost/projetomvcphp/?pagina=post&id='.$_POST['id']);                  
                                          
                } catch (Exception $e){
                    echo '<script>alert("'.$e->getMessage().'")</script>';
                    echo '<script>location.href="http://localhost/projetomvcphp/?pagina=post&mid='.$_POST['id'].'"</script>';
                }   
                                      
            } 
    }