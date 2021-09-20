<?php

    class HomeController
    {
            public function index()
            {
                try{
                    $colecPostagem = Postagem::selecionaTodos();

                    $loader = new \Twig\Loader\FilesystemLoader('View');
                    $twig = new \Twig\Environment($loader);
                    $template = $twig->load('home.html');

                    $parametros = array();
                    $parametros['postagens'] = $colecPostagem;


                    //Ele manda via twig o dado para o html
                   // $parametros['nome'] = 'Renato Marcelo';

                    $conteudo = $template->render($parametros);
                    echo $conteudo;

                                          
                } catch (Exception $e){
                    echo $e->getMessage();
                }
                
                
                
            }
    }