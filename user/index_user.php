<?php
session_start();

require_once '../conexao/DB.php';
require_once '../conexao/Crud.php';

$mostrar_linha = $linha = Crud::ler_todos("linha");
$mostrar_denuncia = $denuncia = Crud::denuncia_status("respondida");
?>

<script type="text/javascript">
    function sucesso() {
        alert("Item adicionado com sucesso!");
    }
</script>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <link href="../layout/css/bootstrap.min.css" rel="stylesheet">
        <link href="../layout/css/denuncia.css" rel="stylesheet">
        <script src="../layout/js/bootstrap.min.js"></script>
        <title></title>
    </head>
    <body>

        <div class="panel panel-default imagem_titulo">
            <div class="panel-body">
                <div>
                    <h1>ÁREA DE DENÚNCIAS <?php echo $_SESSION['id']; ?></h1>
                </div>
            </div>
        </div>

        <div class="row">

            <!-- Navigation Buttons -->
            <div class="col-md-3">
                <ul class="nav nav-pills nav-stacked" id="myTabs">
                    <li class="active "><a class="glyphicon glyphicon-plus" href="#cad_denuncia" data-toggle="pill"> Cadastrar - Denúncia</a></li>
                    <li><a class="glyphicon glyphicon-comment" href="#den_aberta" data-toggle="pill"> Denúncias</a></li>
                    <li><a class="glyphicon glyphicon-alert" href="../index.php"> Sair</a></li>
                </ul>
            </div>

            <!-- Content -->
            <div class="col-md-9" id="box_conteudo">
                <div class="tab-content">

                    <div class="tab-pane active " id="cad_denuncia">
                        <div class="panel panel-primary">
                            <div class="panel-heading">CADASTRO DE DENÚNCIA</div>
                            <div class="panel-body">

                                <form class="form-horizontal box_multi" action="" method="post">

                                    <div class="form-group ">
                                        <label for="selectDenunciaLinha" class="col-sm-2 control-label">Linha</label>
                                        <div class="col-sm-10" id="selectDenunciaLinha">
                                            <select class="form-control" name="linhaDenuncia">
                                                <option selected disabled="">Escolha uma linha</option>
                                                <?php
                                                foreach ($mostrar_linha as $linha_linha) {
                                                    echo "<option value=". $linha_linha->id_linha .">" . $linha_linha->inicio_linha . " / ". $linha_linha->fim_linha . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputDenunciaTexto" class="col-sm-2 control-label">Denuncia:</label>
                                        <div class="col-sm-10">
                                            <textarea name="textoDenuncia" class="form-control" id="inputDenunciaTexto" rows="3"></textarea>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="inputDenunciaData" class="col-sm-4 control-label">Data</label>
                                                <div class="col-sm-5">
                                                    <input type="text" name="dataDenuncia" class="form-control" id="inputDenunciaData" placeholder="    /  /    ">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="inputDenunciaHora" class="col-sm-2 control-label">Hora</label>
                                                <div class="col-sm-5">
                                                    <input type="text" name="horaDenuncia" class="form-control" id="inputDenunciaHora" placeholder="00:00">
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <input type="hidden" name="comando" value="cad_denuncia">
                                        <input type="submit" class="btn btn-primary btn-lg btn-block" value="Enviar">

                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="den_aberta">
                        <div class="panel panel-primary">
                            <div class="panel-heading">DENÚNCIAS RESPONDIDAS</div>
                            <div class="panel-body">
                                
                                <?php
                                foreach ($mostrar_denuncia as $linha_denuncia) {
                                    // echo "<option value=" . $linha_denuncia->inicio_linha . ">" . $linha_linha->inicio_linha . " / " . $linha_linha->fim_linha . "</option>";


                                    echo "<form class='form-horizontal box_multi' action='' method='post'>

                                    <div class='form-group '>
                                        <label for='selectDenunciaLinha' class='col-sm-2 control-label'>Nº</label>
                                        <div class='col-sm-3'>
                                            <input type='text' class='form-control' id='selectDenunciaLinha' value='" . $linha_denuncia->id_denuncia . "' disabled>
                                        </div>
                                    </div>

                                    <div class='form-group '>
                                        <label for='selectDenunciaLinha' class='col-sm-2 control-label'>Linha</label>
                                        <div class='col-sm-10'>
                                            <input type='text' class='form-control' id='selectDenunciaLinha' value='" . $linha_denuncia->inicio_linha . " / " . $linha_denuncia->fim_linha . "' disabled>
                                        </div>
                                    </div>

                                    <div class='form-group'>
                                        <label for='inputDenunciaTexto' class='col-sm-2 control-label'>Denúncia:</label>
                                        <div class='col-sm-10'>
                                            <textarea class='form-control' id='inputDenunciaTexto' rows='3'  disabled>" . $linha_denuncia->texto_denuncia . "</textarea>
                                        </div>
                                    </div>

                                    <div class='row'>
                                        <div class='col-md-6'>
                                            <div class='form-group'>
                                                <label for='inputDenunciaData' class='col-sm-4 control-label'>Data</label>
                                                <div class='col-sm-5'>
                                                    <input type='text' class='form-control' id='inputDenunciaData' value='" . $linha_denuncia->data_denuncia . "' disabled>
                                                </div>
                                            </div>
                                        </div>

                                        <div class='col-md-6'>
                                            <div class='form-group'>
                                                <label for='inputDenunciaHora' class='col-sm-2 control-label'>Hora</label>
                                                <div class='col-sm-5'>
                                                    <input type='text' class='form-control' id='inputDenunciaHora' value='" . $linha_denuncia->hora_denuncia . "' disabled>
                                                </div>
                                            </div>
                                        </div>

                                        <div class='form-group' id='respota_denuncia'>

                                            <label for='inputDenunciaResposta' class='col-sm-2 control-label'>Resposta:</label>
                                            <div class='col-sm-10'>
                                                <textarea name='textoResposta' class='form-control' id='inputDenunciaResposta' rows='3' disabled>" . $linha_denuncia->resposta_denuncia . "</textarea>
                                            </div>
                                        </div>
                                        
                                        <hr>

                                " . "";
                                }
                                ?>
                                

                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </body>
</html>


<?php
//estruturas em PHP



$comando = isset($_POST['comando']) ? $_POST['comando'] : '';


if ($comando == "cad_denuncia") {

    $linha_denuncia = isset($_POST['linhaDenuncia']) ? $_POST['linhaDenuncia'] : '';
    $texto_denuncia = isset($_POST['textoDenuncia']) ? $_POST['textoDenuncia'] : '';
    $data_denuncia = isset($_POST['dataDenuncia']) ? $_POST['dataDenuncia'] : '';
    $hora_denuncia = isset($_POST['horaDenuncia']) ? $_POST['horaDenuncia'] : '';
    $id_usuario = $_SESSION['id'];
    $status_denuncia = "entrada";
    

    if ($linha_denuncia && $texto_denuncia && $data_denuncia && $hora_denuncia) {

        try {

            $sql = "INSERT INTO denuncia (texto_denuncia, hora_denuncia, data_denuncia, status_denuncia, linha_id_linha, usuario_id_usuario) "
                    . "VALUES (:texto, :hora, :data, :status, :id_linha, :id_usuario)";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':texto', $texto_denuncia);
            $stmt->bindParam(':hora', $hora_denuncia);
            $stmt->bindParam(':data', $data_denuncia);
            $stmt->bindParam(':status', $status_denuncia);
            $stmt->bindParam(':id_linha', $linha_denuncia);
            $stmt->bindParam(':id_usuario', $id_usuario);
            $stmt->execute();
            
            echo "<script>sucesso()</script>";
            
        } catch (Exception $ex) {
            echo 'Falha ao inserir linha <br>';
            echo $ex->getMessage();
        }
    }

    unset($_POST);
}