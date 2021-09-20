<?php

class SobreController
    {
            public function index()
            {                                 
                    $loader = new \Twig\Loader\FilesystemLoader('View');
                    $twig = new \Twig\Environment($loader);
                    $template = $twig->load('sobre.html');

                   
                    $parametros = array();
                
                    //Ele manda via twig o dado para o html
                   // $parametros['nome'] = 'Renato Marcelo';

                    $conteudo = $template->render($parametros);
                    echo $conteudo;
                                                       
            }
    }