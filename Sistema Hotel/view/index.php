<?php 
    require_once '../model/cliente.php'; 
    require_once '../model/funcionario.php';
    require_once '../model/quarto.php';   
    $objCliente = new Cliente();    
    $objQuarto  = new Quarto();
    $objFunc    = new Funcionario(); 
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Cliente</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <?php 
      require_once 'menu.php';
    ?>  
  
<div class="container">

<!-- <button onClick="window.location.href = 'logout.php'">Sair</button> -->
  <div class="row  justify-content-md-center">
  <div class="card-md-12">
  <div class="card-body">
                        <h1>Quartos Disponiveis</h1>                     
                    </div>
  
        <?php 
            $query = "SELECT * FROM quarto WHERE disponibilidade = 'Livre'";
            $stmt = $objQuarto->runQuery($query);
            $stmt->execute();
            if($stmt->rowCount() > 0){
                while($rowQuarto = $stmt->fetch(PDO::FETCH_ASSOC)){
        ?>
                    <div class="panel-group">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <?php print $rowQuarto['descricao'] ?>
                            </div>
                            <div class="panel-body">
                                <label for="">Status do Quarto: </label>
                                <?php print $rowQuarto['disponibilidade'] ?>
                                <br/>
                                <label for="">Valor do Quarto: </label>
                                <?php print $rowQuarto['valor'] ?>
                                <br/>
                                <label for="">Número do Quarto</label>
                                <?php print $rowQuarto['id'] ?>
                                <br/>
                                <button 
                                    class="btn btn-primary" type="button"
                                    data-toggle="modal" data-target="#myModalCadastrar"
                                    data-quartoid="<?php print $rowQuarto['id'] ?>">
                                    Reservar
                                </button>
                            </div>
                        </div>            
                    </div>
        <?php             
                }
            }
        ?>
  </div>
  </div>
</div>

<!-- <Container Ocupado> -->
<div class="container">
<!-- <button onClick="window.location.href = 'logout.php'">Sair</button> -->
  <div class="row justify-content-md-center">

  <div class="row  justify-content-md-center">
  <div class="card-md-12">
  <div class="card-body">
                        <h1>Quartos Indisponiveis</h1>                     
                    </div>
        <?php 
            $query = "SELECT * FROM quarto WHERE disponibilidade = 'Ocupado'";
            $stmt = $objQuarto->runQuery($query);
            $stmt->execute();
            if($stmt->rowCount() > 0){
                while($rowQuarto = $stmt->fetch(PDO::FETCH_ASSOC)){
        ?>
                    <div class="panel-group">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <?php print $rowQuarto['descricao'] ?>
                            </div>
                            <div class="panel-body">
                                <label for="">Status do Quarto: </label>
                                <?php print $rowQuarto['disponibilidade'] ?>
                                <br/>
                                <label for="">Valor do Quarto: </label>
                                <?php print $rowQuarto['valor'] ?>
                                <br/>
                                <label for="">Número do Quarto</label>
                                <?php print $rowQuarto['id'] ?>
                                <br/>
                                <button 
                                    class="btn btn-primary" type="button"
                                    data-toggle="modal" data-quartoid="<?php print $rowQuarto['id'] ?>">
                                    Liberar
                                    <input type="hidden" id="quarto_id" name="txtLibera">
                                </button>
                            </div>
                        </div>            
                    </div>
        <?php             
                }
            }
        ?>
  </div>
  </div>
</div>

<!-- Modal Cadastrar Reserva-->
<div id="myModalCadastrar" class="modal fade" role="dialog">
  <div class="modal-dialog">

 <!-- liberar-> 

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: black; color: white;">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title">Novo Reserva</h4>
      </div>
      <div class="modal-body">
        <form action="../control/ctr_reserva.php" method="POST">
            <input type="hidden" name="insert" value="1">
            <input type="hidden" id="quarto_id" name="txtQuarto">
            <div class="form-group">
              <label for="nome">Funcionario:</label>
              <select name="txtFunc" id="txtFunc" class="form-control">
                  <?php 
                        $queryF = "SELECT * FROM funcionario";      
                        $stmtF = $objFunc->runQuery($queryF);
                        $stmtF->execute();
                        if($stmtF->rowCount() > 0){
                            while($rowFunc = $stmtF->fetch(PDO::FETCH_ASSOC)){                                
                  ?>
                                <option value="<?php print $rowFunc['id'] ?>"><?php print $rowFunc['nome'] ?></option>
                  <?php                   
                            }
                        }
                  ?>
              </select>
            </div>
            <div class="form-group">
              <label for="nome">Cliente:</label>
              <select name="txtCliente" id="txtCliente" class="form-control">
                  <?php 
                        $queryC = "SELECT * FROM cliente";      
                        $stmtC = $objCliente->runQuery($queryC);
                        $stmtC->execute();
                        if($stmtC->rowCount() > 0){
                            while($rowCliente = $stmtC->fetch(PDO::FETCH_ASSOC)){                                
                  ?>
                                <option value="<?php print $rowCliente['id'] ?>"><?php print $rowCliente['nome'] ?></option>
                  <?php                   
                            }
                        }
                  ?>
              </select>
            </div>
            <div class="form-group">
              <label for="idade">Data Inicial:</label>
              <input type="date" name="txtData_ini" id="txtData_ini" class="form-control">
            </div>

            <div class="form-group">
              <label for="idade">Data Final:</label>
              <input type="date" name="txtData_fim" id="txtData_fim"class="form-control">
            </div>            
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>      
      </div>     
    </div>

  </div>
</div>
<!-- Modal FIM Cadastrar Reserva-->

<script>
    $('#myModalCadastrar').on('show.bs.modal', function(event){
        var button = $(event.relatedTarget)
        var recipientid = button.data('quartoid');

        var modal = $(this)
        modal.find('modal-title').text('Nova Reserva');
        modal.find('#quarto_id').val(recipientid);
    })
</script>

</body>
</html>