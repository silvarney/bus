<?php
session_start();
require_once 'conexao/DB.php';
?>

<script type="text/javascript">
    function pagina_user() {
        alert("Login efetuado com sucesso!");
        window.location.href = "user/index_user.php";
    }
    function pagina_empresa() {
        window.location.href = "empresa/index_empresa.php";
    }
    function pagina_setransbel() {
        window.location.href = "setransbel/index_setransbel.php";
    }
</script>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <link href="layout/css/bootstrap.min.css" rel="stylesheet">
        <link href="layout/css/denuncia.css" rel="stylesheet">
        <script src="layout/js/bootstrap.min.js"></script>
        <title></title>
    </head>
    <body>

        <div class="panel panel-default imagem_titulo">
            <div class="panel-body">
                <div>
                    <h1>DENÚNCIAS.COM</h1>
                </div>
            </div>
        </div>



        <div class="panel panel-default" id="box_login">
            <div class="panel-body">

                <div>

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#login" aria-controls="login" role="tab" data-toggle="tab">Login</a></li>
                        <li role="presentation"><a href="#novo" aria-controls="novo" role="tab" data-toggle="tab">Novo Usuário</a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">

                        <!--box de login-->
                        <div role="tabpanel" class="tab-pane active" id="login">
                            <form action="#" method="post">
                                <div class="form-group">
                                    <label for="exampleInputUser">Usuário</label>
                                    <input type="text" name="userLogin" class="form-control" id="exampleInputUser" placeholder="nome de usuário">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputSenha">Senha</label>
                                    <input type="password" name="senhaLogin" class="form-control" id="exampleInputSenha" placeholder="Senha">
                                </div>
                                <input type="hidden" name="comando" value="login">
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Entrar</button>
                            </form>
                        </div>

                        <!--box de cadastro-->
                        <div role="tabpanel" class="tab-pane" id="novo">
                            <form action="#" method="post">
                                <div class="form-group">
                                    <label for="InputNome">Nome</label>
                                    <input type="text" name="nomeCadastro" class="form-control" id="InputNome" placeholder="nome">
                                </div>
                                <div class="form-group">
                                    <label for="InputUser">Usuário</label>
                                    <input type="text" name="userCadastro" class="form-control" id="InputUser" placeholder="apelido de usuário">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Senha</label>
                                    <input type="password" name="senhaCadastro" class="form-control" id="exampleInputPassword1" placeholder="Senha">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="email" name="emailCadastro" class="form-control" id="exampleInputEmail2" placeholder="Email">
                                </div>
                                <input type="hidden" name="comando" value="cadastro">
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Salvar</button>
                            </form>
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


if ($comando == "cadastro") {

    $nome = isset($_POST['nomeCadastro']) ? $_POST['nomeCadastro'] : '';
    $user = isset($_POST['userCadastro']) ? $_POST['userCadastro'] : '';
    $senha = isset($_POST['senhaCadastro']) ? $_POST['senhaCadastro'] : '';
    $email = isset($_POST['emailCadastro']) ? $_POST['emailCadastro'] : '';
    $tipo = "nivel_1";  //nivel_1, passageiro; nivel_2, empresa; nivel_3, setranbel;

    if ($nome && $user && $senha && $email) {

        try {

            $sql = "INSERT INTO usuario (nome_usuario, user_usuario, senha_usuario, email_usuario, tipo_usuario) "
                    . "VALUES (:nome, :user, :senha, :email, :tipo)";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':user', $user);
            $stmt->bindParam(':senha', $senha);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':tipo', $tipo);
            $stmt->execute();
        } catch (Exception $ex) {
            echo 'Falha ao inserir usuário <br>';
            echo $ex->getMessage();
        }
    }

    unset($_POST);
} elseif ($comando == "login") {

    $user_login = isset($_POST['userLogin']) ? $_POST['userLogin'] : '';
    $senha_login = isset($_POST['senhaLogin']) ? $_POST['senhaLogin'] : '';

    try {
        $sql = "SELECT * FROM usuario WHERE user_usuario = :user AND senha_usuario = :senha";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':user', $user_login);
        $stmt->bindParam(':senha', $senha_login);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {

            $dados_login = $stmt->fetch(PDO::FETCH_OBJ);

            $_SESSION['id'] = $dados_login->id_usuario;
            $_SESSION['nome'] = $dados_login->nome_usuario;
            $nivel = $dados_login->tipo_usuario;

            switch ($nivel) {
                case "nivel_1":
                    echo "<script>pagina_user()</script>";
                    break;
                case "nivel_2":
                    echo "<script>pagina_empresa()</script>";
                    break;
                case "nivel_3":
                    echo "<script>pagina_setransbel()</script>";
                    break;
            }
        }
    } catch (Exception $ex) {
        echo 'Falha ao executar login <br>';
        echo $ex->getMessage();
    }
}

