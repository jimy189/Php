<?php

class AdminController
    {
            public function index()
            {                                 
                    $loader = new \Twig\Loader\FilesystemLoader('View');
                    $twig = new \Twig\Environment($loader);
                    $template = $twig->load('admin.html');

                   $objPostagens = Postagem::selecionaTodos();

                    $parametros = array();
                    $parametros['postagens'] = $objPostagens;
                    //Ele manda via twig o dado para o html
                   // $parametros['nome'] = 'Renato Marcelo';

                    $conteudo = $template->render($parametros);
                    echo $conteudo;
                                                       
            }

            public function create()
            {
                $loader = new \Twig\Loader\FilesystemLoader('View');
                $twig = new \Twig\Environment($loader);
                $template = $twig->load('create.html');

               
                $parametros = array();
                        
                $conteudo = $template->render($parametros);
                echo $conteudo;
            }

            public function insert()
            {
                //try verificar teve erro ou não
                try{

                    Postagem::insert($_POST);

                    echo '<script>alert("Publicação inserida com sucesso!")</script>';
                    echo '<script>location.href="http://localhost/projetomvcphp/?pagina=admin&metodo=index"</script>';
                } catch(Exception $e){
                    echo '<script>alert("'.$e->getMessage().'")</script>';
                    echo '<script>location.href="http://localhost/projetomvcphp/?pagina=admin&metodo=create"</script>';
                }
                //USANDO var_dump verificar se ta sertando a requisição post
                //var_dump($_POST);
                
            }


            public function change($paramId)
            {
                $loader = new \Twig\Loader\FilesystemLoader('View');
                $twig = new \Twig\Environment($loader);
                $template = $twig->load('update.html');
              
                $post = Postagem::selecionaPorId($paramId);

                $parametros = array();
                $parametros['id'] = $post->id;
                $parametros['titulo'] = $post->titulo;
                $parametros['conteudo'] = $post->conteudo;
                        
                $conteudo = $template->render($parametros);
                echo $conteudo;
            }

            public function update()
            {
                try{
                    Postagem::update($_POST);
                    echo '<script>alert("Publicação alterada com sucesso!")</script>';
                    echo '<script>location.href="http://localhost/projetomvcphp/?pagina=admin&metodo=index"</script>';

                }catch (Exception $e) {
                    echo '<script>alert("'.$e->getMessage().'")</script>';
                    echo '<script>location.href="http://localhost/projetomvcphp/?pagina=admin&metodo=change&id='.$_POST['id'].'"</script>';
                }          
            }

            public function delete($paramId)
            {
                try{
                    Postagem::delete($paramId);
                    echo '<script>alert("Publicação apagada com sucesso!")</script>';
                    echo '<script>location.href="http://localhost/projetomvcphp/?pagina=admin&metodo=index"</script>';
                }catch (Exception $e){
                    echo '<script>alert("'.$e->getMessage().'")</script>';
                    echo '<script>location.href="http://localhost/projetomvcphp/?pagina=admin&metodo=index"</script>';
                }

                Postagem::delete($_POST);

            }


    }