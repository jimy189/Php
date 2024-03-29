<?php 
    require_once '../model/quarto.php';
    $objQuarto = new Quarto();
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
  <div class="row">
    <table class="table table-striped">
        <thead>
        <tr>
          <th colspan="5">
              <a href="#" data-toggle="modal" data-target="#myModalCadastrar">
                  <span class="glyphicon glyphicon-plus"></span>
              </a>
          </th>
        </tr>
        <tr>
            <th>Descrição</th>
            <th>Status</th>
            <th>Valor</th>
            <th>Editar</th>
            <th>Deletar</th>
        </tr>
        </thead>
        <tbody>
        <?php 
            $sql = "SELECT * FROM quarto";
            $stmt = $objQuarto->runQuery($sql);
            $stmt->execute();
            if($stmt->rowCount() > 0){
                while($rowQuarto = $stmt->fetch(PDO::FETCH_ASSOC)){            
        ?>            
                        <tr>
                            <td><?php print $rowQuarto['descricao'] ?></td>
                            <td><?php print $rowQuarto['disponibilidade'] ?></td>
                            <td><?php print $rowQuarto['valor'] ?></td>

                            <td>
                                <a href="#">
                                  <span class="glyphicon glyphicon-pencil"
                                    data-toggle="modal" data-target="#myModalEditar"
                                    data-quartid="<?php print$rowQuarto['id'] ?>"
                                    data-quartdescricao="<?php print $rowQuarto['descricao'] ?>" 
                                    data-quartvalor="<?php print $rowQuarto['valor'] ?>">                                                          
                                  </span>
                                </a>
                            </td>
                            
                            <td>
                                <a href="../control/ctr_quarto.php?delete_id=<?php print $rowQuarto['id'] ?>">
                                  <span class="glyphicon glyphicon-trash"></span>
                                </a>
                            </td>
                        </tr>  
        <?php 
                }
            }
        ?>
        </tbody>
    </table>
  </div>
</div>

<!-- Modal Cadastrar Quarto-->
<div id="myModalCadastrar" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: black; color: white;">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title">Novo Quarto</h4>
      </div>
      <div class="modal-body">
        <form action="../control/ctr_quarto.php" method="POST">
            <input type="hidden" name="insert" value="1">
            <div class="form-group">
              <label for="nome">Quarto:</label>
              <input type="text" class="form-control" id="txtDescricao" name="txtDescricao">
            </div>

             <div class="form-group">
              <label for="status">Status:</label>
              <select name="txtDisponibilidade" id="txtDisponibilidade" class="form-control">
                <option value="Livre">Livre</option>
                <option value="Ocupado">Ocupado</option>
              </select>
            </div>    

            <div class="form-group">
              <label for="Valor">Valor:</label>
              <input type="number" class="form-control" id="txtValor" name="txtValor">
            </div>
                   
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>      
      </div>     
    </div>

  </div>
</div>
<!-- Modal FIM Cadastrar quarto-->

<!-- Modal editar quarto-->
<div id="myModalEditar" class="modal fade" role="dialog">
  <div class="modal-dialog">

  <!-- Modal content-->
  <div class="modal-content">
      <div class="modal-header" style="background-color: black; color: white;">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title">Editar Quarto</h4>
      </div>
      <div class="modal-body">
        <form action="../control/ctr_quarto.php" method="POST">
            <input type="hidden" name="txtEditar" id="recipient-id">
            <div class="form-group">
            <label for="nome">Quarto:</label>
              <input type="text" class="form-control" id="txtDescricao" name="txtDescricao">
            </div>

            <div class="form-group">
            <label for="status">Status:</label>
            <select name="txtDisponibilidade" id="txtDisponibilidade" class="form-control">
               <option value="Livre">Livre</option>
                <option value="Ocupado">Ocupado</option>
              </select>
            </div> 


            <div class="form-group">
              <label for="Valor">Valor:</label>
              <input type="number" class="form-control" id="txtValor" name="txtValor">
            </div>
                     
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>      
      </div>     
    </div>
  </div>
</div>
<!-- Modal FIM Editar Cliente-->


<script>
  $('#myModalEditar').on('show.bs.modal', function(event){
      var button = $(event.relatedTarget)
      var recipientid = button.data('quartid'); 
      var recipientdescricao = button.data('quartdescricao');
      var recipientvalor = button.data('quartvalor');

      var modal = $(this)
      modal.find('.modal-title').text('Editar Cliente');
      modal.find('#recipient-id').val(recipientid);
      modal.find('#txtDescricao').val(recipientdescricao);
      modal.find('#txtValor').val(recipientvalor);

  })
</script>
            
</body>
</html>