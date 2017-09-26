<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
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
                    <li class="active "><a class="glyphicon glyphicon-plus" href="#cad_linha" data-toggle="pill"> Cadastrar - Linha</a></li>
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
                                <form class="form-horizontal box_multi">

                                    <div class="form-group ">
                                        <label for="inputInicio" class="col-sm-2 control-label">Ponto de Partida</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputInicio" placeholder="local de saída">
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for="inputChegada" class="col-sm-2 control-label">Ponto de Chegada</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputChegada" placeholder="local de chegada">
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for="selectLinhaOnibus" class="col-sm-2 control-label">Onibus</label>
                                        <div class="col-sm-10" id="selectLinhaOnibus">
                                            <select class="form-control">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div>
                                    </div>

                                    <input type="submit" class="btn btn-primary btn-lg btn-block" value="Salvar">

                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="den_aberta">
                        <div class="panel panel-primary">
                            <div class="panel-heading">DENÚNCIA EM ABERTO</div>
                            <div class="panel-body">

                                <form class="form-horizontal box_multi">

                                    <div class="form-group ">
                                        <label for="selectDenunciaLinha" class="col-sm-2 control-label">Linha</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="selectDenunciaLinha" value="Icui-UFPA" disabled>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputDenunciaTexto" class="col-sm-2 control-label">Denúncia:</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" id="inputDenunciaTexto" rows="3"  disabled>Texto</textarea>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="inputDenunciaData" class="col-sm-4 control-label">Data</label>
                                                <div class="col-sm-5">
                                                    <input type="text" class="form-control" id="inputDenunciaData" value="22/09/2017" disabled>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="inputDenunciaHora" class="col-sm-2 control-label">Hora</label>
                                                <div class="col-sm-5">
                                                    <input type="text" class="form-control" id="inputDenunciaHora" value="00:00" disabled>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group" id="respota_denuncia" >

                                            <label for="inputDenunciaResposta" class="col-sm-2 control-label">Resposta:</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" id="inputDenunciaResposta" rows="3"></textarea>
                                            </div>
                                        </div>

                                        <input type="submit" class="btn btn-primary btn-lg btn-block" value="Enviar">

                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="cad_cobrador">
                        <div class="panel panel-primary">
                            <div class="panel-heading">CADASTRO - COBRADOR</div>
                            <div class="panel-body">

                                <form class="form-horizontal box_multi">

                                    <div class="form-group ">
                                        <label for="inputNomeCobrador" class="col-sm-2 control-label">Nome</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputNomeCobrador" placeholder="nome">
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for="inputFone" class="col-sm-2 control-label">Telefone</label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" id="inputFone" placeholder="(91) 99999-9999">
                                        </div>
                                    </div>

                                    <input type="submit" class="btn btn-primary btn-lg btn-block" value="Salvar">

                                </form>

                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="cadastrar_produto">
                        <div class="panel panel-primary">
                            <div class="panel-heading">CADASTRAR PRODUTO</div>
                            <div class="panel-body">

                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="cadastrar_categoria">
                        <div class="panel panel-primary">
                            <div class="panel-heading">CADASTRO DE CATEGORIAS</div>
                            <div class="panel-body">

                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="usuario">
                        <div class="panel panel-primary">
                            <div class="panel-heading">USUÁRIOS</div>
                            <div class="panel-body">

                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </body>
</html>
