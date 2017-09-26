<?php
require_once '../conexao/DB.php';
require_once '../conexao/Crud.php';

$mostrar_onibus = $onibus = Crud::ler_todos("onibus");
$mostrar_denuncia = $denuncia = Crud::denuncia_status("entrada");
?>

<script type="text/javascript">
    function sucesso() {
        window.location.href = "index_setransbel.php";
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
        <script type="text/javascript">
    $('#myTabs a').click(function (e) {
        e.preventDefault()
        $(this).tab('show')
    });
        </script>
        <title></title>
    </head>
    <body>

        <div class="panel panel-default imagem_titulo">
            <div class="panel-body">
                <div>
                    <h1>SETRANSBEL</h1>
                </div>
            </div>
        </div>

        <div class="row">

            <!-- Navigation Buttons -->
            <div class="col-md-3">
                <ul class="nav nav-pills nav-stacked" id="myTabs">
                    <li class="active"><a class="glyphicon glyphicon-plus" href="#cad_linha" data-toggle="pill"> Cadastrar - Linha</a></li>
                    <li><a class="glyphicon glyphicon-comment" href="#den_aberta" data-toggle="pill"> Denúncias</a></li>
                    <li><a class="glyphicon glyphicon-alert" href="../index.php"> Sair</a></li>
                </ul>
            </div>

            <!-- Content -->
            <div class="col-md-9" id="box_conteudo">
                <div class="tab-content">

                    <div class="tab-pane active " id="cad_linha">
                        <div class="panel panel-primary">
                            <div class="panel-heading">CADASTRO DE LINHA</div>
                            <div class="panel-body">
                                <form class="form-horizontal box_multi" action="" method="post">

                                    <div class="form-group ">
                                        <label for="inputInicio" class="col-sm-2 control-label">Ponto de Partida</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="inicioLinha" class="form-control" id="inputInicio" placeholder="local de saída">
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for="inputChegada" class="col-sm-2 control-label">Ponto de Chegada</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="chegadaLinha" class="form-control" id="inputChegada" placeholder="local de chegada">
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for="selectLinhaOnibus" class="col-sm-2 control-label">Onibus</label>
                                        <div class="col-sm-10" id="selectLinhaOnibus">
                                            <select class="form-control" name="onibusLinha">
                                                <option selected disabled="">Escolha um Onibus</option>
                                                <?php
                                                foreach ($mostrar_onibus as $linha_onibus) {
                                                    echo "<option value=" . $linha_onibus->id_onibus . ">" . $linha_onibus->placa_onibus . " - " . $linha_onibus->modelo_onibus . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <input type="hidden" name="comando" value="cad_linha">
                                    <input type="submit" class="btn btn-primary btn-lg btn-block" value="Salvar">

                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="den_aberta">
                        <div class="panel panel-primary">
                            <div class="panel-heading">CAIXA DE ENTRADA</div>
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
                                                <textarea name='textoResposta' class='form-control' id='inputDenunciaResposta' rows='3'></textarea>
                                            </div>
                                        </div>
                                        
                                        <input type='hidden' name='idDenuncia' value='" . $linha_denuncia->id_denuncia . "'>
                                        <input type='hidden' name='comando' value='cad_resposta'>
                                        <input type='submit' class='btn btn-primary btn-lg btn-block' value='Enviar'>
                                        
                                        <hr>

                                " . "";
                                }
                                ?>

                            </div>
                            </form>

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


if ($comando == "cad_linha") {

    $inicio_linha = isset($_POST['inicioLinha']) ? $_POST['inicioLinha'] : '';
    $chegada_linha = isset($_POST['chegadaLinha']) ? $_POST['chegadaLinha'] : '';
    $onibus_linha = isset($_POST['onibusLinha']) ? $_POST['onibusLinha'] : '';


    if ($inicio_linha && $chegada_linha && $onibus_linha) {

        try {

            $sql = "INSERT INTO linha (inicio_linha, fim_linha, onibus_id_onibus) "
                    . "VALUES (:inicio, :fim, :id_onibus)";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':inicio', $inicio_linha);
            $stmt->bindParam(':fim', $chegada_linha);
            $stmt->bindParam(':id_onibus', $onibus_linha);
            $stmt->execute();

            echo "<script>sucesso()</script>";
        } catch (Exception $ex) {
            echo 'Falha ao inserir linha <br>';
            echo $ex->getMessage();
        }
    }

    unset($_POST);
} elseif ($comando == "cad_resposta") {


    $id_denuncia = isset($_POST['idDenuncia']) ? $_POST['idDenuncia'] : '';
    $resposta_denuncia = isset($_POST['textoResposta']) ? $_POST['textoResposta'] : '';
    $status_resposta_denuncia = "respondida";

    


    if ($id_denuncia && $resposta_denuncia && $status_resposta_denuncia) {

        

        try {

            $sql = "UPDATE `denuncia` SET `resposta_denuncia` = '" . $resposta_denuncia . "', `status_denuncia` = '" . $status_resposta_denuncia . "' WHERE `denuncia`.`id_denuncia` = " . $id_denuncia . "";
            $stmt = DB::prepare($sql);
            echo "<script>sucesso()</script>";
            $stmt->execute();
        } catch (Exception $ex) {
            echo 'Falha ao inserir resposta <br>';
            echo $ex->getMessage();
        }
    }

    unset($_POST);
}