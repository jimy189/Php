<?php 
    require_once '../model/funcionario.php';
    $objFuncionario = new Funcionario();
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
            <th>Nome</th>
            <th>Idade</th>           
            <th>Editar</th>
            <th>Deletar</th>
        </tr>
        </thead>
        <tbody>
        <?php 
            $sql = "SELECT * FROM funcionario";
            $stmt =  $objFuncionario->runQuery($sql);
            $stmt->execute();
            if($stmt->rowCount() > 0){
                while($rowFuncionario = $stmt->fetch(PDO::FETCH_ASSOC)){            
        ?>            
                        <tr>
                            <td><?php print $rowFuncionario['nome'] ?></td>
                            <td><?php print $rowFuncionario['telefone'] ?></td>
                            <td>
                                <a href="#">
                                  <span class="glyphicon glyphicon-pencil"
                                    data-toggle="modal" data-target="#myModalEditar"
                                    data-funcid="<?php print $rowFuncionario['id'] ?>"
                                    data-funcnome="<?php print $rowFuncionario['nome'] ?>" 
                                    data-functelefone="<?php print $rowFuncionario['telefone'] ?>">                       
                                  </span>
                                </a>
                            </td>
                            <td>
                                <a href="../control/ctr_funcionario.php?delete_id=<?php print $rowFuncionario['id'] ?>">
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

<!-- Modal Cadastrar Cliente-->
<div id="myModalCadastrar" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: black; color: white;">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title">Novo Funcionario</h4>
      </div>
      <div class="modal-body">
        <form action="../control/ctr_funcionario.php" method="POST">
            <input type="hidden" name="insert" value="1">
            <div class="form-group">
              <label for="nome">Nome:</label>
              <input type="text" class="form-control" id="txtNome" name="txtNome">
            </div>
            <div class="form-group">
              <label for="telefone">Telefone:</label>
              <input type="text" class="form-control" id="txtTelefone" name="txtTelefone">
            </div>           
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>      
      </div>     
    </div>

  </div>
</div>
<!-- Modal FIM Cadastrar Cliente-->
<div id="myModalEditar" class="modal fade" role="dialog">
  <div class="modal-dialog">


  <div class="modal-content">
      <div class="modal-header" style="background-color: black; color: white;">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title">Editar Funcinário</h4>
      </div>
      <div class="modal-body">
        <form action="../control/ctr_funcionario.php" method="POST">
            <input type="hidden" name="txtEditar" id="recipient-id">
            <div class="form-group">
              <label for="nome">Nome:</label>
              <input type="text" class="form-control" id="txtNome" name="txtNome">
            </div>

            <div class="form-group">
              <label for="idade">Telefone:</label>
              <input type="text" class="form-control" id="txtTelefone" name="txtTelefone">
            </div> 
                    
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>      
      </div>     
    </div>
  </div>
</div>

  <script>
  $('#myModalEditar').on('show.bs.modal', function(event){
      var button = $(event.relatedTarget)
      var recipientid = button.data('funcid'); 
      var recipientnome = button.data('funcnome');
      var recipienttelefone= button.data('functelefone');

      var modal = $(this)
      modal.find('.modal-title').text('Editar Funcionario');
      modal.find('#recipient-id').val(recipientid);
      modal.find('#txtNome').val(recipientnome);
      modal.find('#txtTelefone').val(recipienttelefone);

  })
</script>

</body>
</html>