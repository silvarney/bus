<?php
require_once '../conexao/DB.php';
require_once '../conexao/Crud.php';

$mostrar_motorista = $motorista = Crud::ler_todos("motorista");
$mostrar_cobrador = $cobrador = Crud::ler_todos("cobrador");
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
                    <h1>VIAÇÃO - TRANSPORTS</h1>
                </div>
            </div>
        </div>

        <div class="row">

            <!-- Navigation Buttons -->
            <div class="col-md-3">
                <ul class="nav nav-pills nav-stacked" id="myTabs">
                    <li class="active "><a class="glyphicon glyphicon-plus" href="#cad_onibus" data-toggle="pill"> Cadastrar - Onibus</a></li>
                    <li><a class="glyphicon glyphicon-plus" href="#cad_motorista" data-toggle="pill"> Cadastrar - Motorista</a></li>
                    <li><a class="glyphicon glyphicon-plus" href="#cad_cobrador" data-toggle="pill"> Cadatrar - Cobrador</a></li>
                    <li><a class="glyphicon glyphicon-alert" href="../index.php"> Sair</a></li>
                </ul>
            </div>

            <!-- Content -->
            <div class="col-md-9" id="box_conteudo">
                <div class="tab-content">

                    <div class="tab-pane active " id="cad_onibus">
                        <div class="panel panel-primary">
                            <div class="panel-heading">CADASTRO DE VEICULOS</div>
                            <div class="panel-body">
                                <form class="form-horizontal box_multi" action="#" method="post">

                                    <div class="form-group ">
                                        <label for="inputPlaca" class="col-sm-2 control-label">Placa</label>
                                        <div class="col-sm-2">
                                            <input type="text" name="placaOnibus" class="form-control" id="inputPlaca" placeholder="XXX-0000">
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for="inputModelo" class="col-sm-2 control-label">Modelo</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="modeloOnibus" class="form-control" id="inputModelo" placeholder="modelo">
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for="selectMotorista" class="col-sm-2 control-label">Motorista</label>
                                        <div class="col-sm-10" id="selectMotorista">
                                            <select class="form-control" name="motoristaOnibus">
                                                <option selected disabled="">Escolha um Motorista</option>
                                                <?php
                                                foreach ($mostrar_motorista as $linha_motorista) {
                                                    echo "<option value=" . $linha_motorista->id_motorista . ">" . $linha_motorista->nome_motorista . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for="selectCobrador" class="col-sm-2 control-label">Cobrador</label>
                                        <div class="col-sm-10" id="selectCobrador">
                                            <select class="form-control" name="cobradorOnibus">
                                                <option selected disabled="">Escolha um Cobrador</option>
                                                <?php
                                                foreach ($mostrar_cobrador as $linha_cobrador) {
                                                    echo "<option value=" . $linha_cobrador->id_cobrador . ">" . $linha_cobrador->nome_cobrador . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <input type="hidden" name="comando" value="cad_onibus">
                                    <input type="submit" class="btn btn-primary btn-lg btn-block" value="Salvar">

                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="cad_motorista">
                        <div class="panel panel-primary">
                            <div class="panel-heading">CADASTRO - MOTORISTA</div>
                            <div class="panel-body">

                                <form class="form-horizontal box_multi" action="#" method="post">

                                    <div class="form-group ">
                                        <label for="inputNomeMotorista" class="col-sm-2 control-label">Nome</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="nomeMotorista" class="form-control" id="inputNomeMotorista" placeholder="nome">
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for="inputFone" class="col-sm-2 control-label">Telefone</label>
                                        <div class="col-sm-2">
                                            <input type="text" name="foneMotorista" class="form-control" id="inputFone" placeholder="(91) 99999-9999">
                                        </div>
                                    </div>

                                    <input type="hidden" name="comando" value="cad_motorista">
                                    <input type="submit" class="btn btn-primary btn-lg btn-block" value="Salvar">

                                </form>

                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="cad_cobrador">
                        <div class="panel panel-primary">
                            <div class="panel-heading">CADASTRO - COBRADOR</div>
                            <div class="panel-body">

                                <form class="form-horizontal box_multi" action="" method="post">

                                    <div class="form-group ">
                                        <label for="inputNomeCobrador" class="col-sm-2 control-label">Nome</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="nomeCobrador" class="form-control" id="inputNomeCobrador" placeholder="nome">
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for="inputFone" class="col-sm-2 control-label">Telefone</label>
                                        <div class="col-sm-2">
                                            <input type="text" name="foneCobrador" class="form-control" id="inputFone" placeholder="(91) 99999-9999">
                                        </div>
                                    </div>

                                    <input type="hidden" name="comando" value="cad_cobrador">
                                    <input type="submit" class="btn btn-primary btn-lg btn-block" value="Salvar">

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


if ($comando == "cad_motorista") {

    $nome_motorista = isset($_POST['nomeMotorista']) ? $_POST['nomeMotorista'] : '';
    $fone_motorista = isset($_POST['foneMotorista']) ? $_POST['foneMotorista'] : '';

    if ($nome_motorista && $fone_motorista) {

        try {

            $sql = "INSERT INTO motorista (nome_motorista, fone_motorista) "
                    . "VALUES (:nome, :fone)";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':nome', $nome_motorista);
            $stmt->bindParam(':fone', $fone_motorista);
            return $stmt->execute();
        } catch (Exception $ex) {
            echo 'Falha ao inserir motorista <br>';
            echo $ex->getMessage();
        }
    }

    unset($_POST);
} elseif ($comando == "cad_cobrador") {


    $nome_cobrador = isset($_POST['nomeCobrador']) ? $_POST['nomeCobrador'] : '';
    $fone_cobrador = isset($_POST['foneCobrador']) ? $_POST['foneCobrador'] : '';

    if ($nome_cobrador && $fone_cobrador) {

        try {

            $sql = "INSERT INTO cobrador (nome_cobrador, fone_cobrador) "
                    . "VALUES (:nome, :fone)";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':nome', $nome_cobrador);
            $stmt->bindParam(':fone', $fone_cobrador);
            return $stmt->execute();
        } catch (Exception $ex) {
            echo 'Falha ao inserir cobrador <br>';
            echo $ex->getMessage();
        }
    }

    unset($_POST);
} elseif ($comando == "cad_onibus") {


    $placa_onibus = isset($_POST['placaOnibus']) ? $_POST['placaOnibus'] : '';
    $modelo_onibus = isset($_POST['modeloOnibus']) ? $_POST['modeloOnibus'] : '';
    $id_motorista = isset($_POST['motoristaOnibus']) ? $_POST['motoristaOnibus'] : '';
    $id_cobrador = isset($_POST['cobradorOnibus']) ? $_POST['cobradorOnibus'] : '';
    
    if ($placa_onibus && $modelo_onibus && $id_cobrador && $id_motorista) {

        try {

            $sql = "INSERT INTO onibus (placa_onibus, modelo_onibus, cobrador_id_cobrador, motorista_id_motorista) "
                    . "VALUES (:placa, :modelo, :id_cobrador, :id_motorista)";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':placa', $placa_onibus);
            $stmt->bindParam(':modelo', $modelo_onibus);
            $stmt->bindParam(':id_cobrador', $id_cobrador);
            $stmt->bindParam(':id_motorista', $id_motorista);
            echo "<script>sucesso()</script>";
            $stmt->execute();
        } catch (Exception $ex) {
            echo 'Falha ao inserir onibus <br>';
            echo $ex->getMessage();
        }
    }

    unset($_POST);
}