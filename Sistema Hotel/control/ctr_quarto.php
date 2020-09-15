<?php 
    require_once '../model/quarto.php';
    $objQuarto = new Quarto();

    if(isset($_POST['insert'])){        
        $descricao = $_POST['txtDescricao'];
        $disponibilidade = $_POST['txtDisponibilidade'];
        $valor = $_POST['txtValor'];       
        if($objQuarto->insert($descricao, $disponibilidade, $valor)){
            $objQuarto->redirect('../view/quarto.php');
        }
    }

    if(isset($_GET['delete_id'])){
        $id = $_GET['delete_id'];
        if($objQuarto->delete($id)){
            $objQuarto->redirect('../view/quarto.php');
        }
    }

    if(isset($_POST['txtEditar'])){
        $id = $_POST['txtEditar'];
        $descricao = $_POST['txtDescricao'];
        $disponibilidade= $_POST['txtDisponibilidade'];
        $valor = $_POST['txtValor'];
        if($objQuarto->update($descricao, $disponibilidade, $valor, $id)){
            $objQuarto->redirect('../view/quarto.php');
        }      
    }
?>