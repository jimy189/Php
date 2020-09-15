<?php 
    require_once '../model/reserva.php';
    require_once '../model/quarto.php';
    $objReserva = new Reserva();
    $objQuarto  = new Quarto();

    if(isset($_POST['insert'])){
        $quarto   = $_POST['txtQuarto'];
        $func     = $_POST['txtFunc'];
        $cliente  = $_POST['txtCliente'];
        $data_ini = $_POST['txtData_ini'];
        $data_fim     = $_POST['txtData_fim'];        
        if($objReserva->insert($func, $quarto, $cliente, $data_ini, $data_fim)){
            $objQuarto->updateStatus('Ocupado', $quarto);
            $objReserva->redirect('../view/index.php');
        }
    }

?>