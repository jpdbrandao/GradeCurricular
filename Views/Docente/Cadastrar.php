<?php 
   require_once '../../Models/Enum/TipoDeContrato.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <!-- Required meta tags -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="../../fontawesome/css/all.min.css">

        <!-- Estilo persinalizado -->
        <link rel="stylesheet" href="../../Css/estilo.css">

        <title>Cadastrar - Funcionario</title>
    </head>
    <body>
        <!-- Area da lista -->
        <div id="area-principal" class="container bg-primary">

            <input type="hidden" id="nivelAcessoAtivo" value="<?= $usuario->nivelAcesso ?>">

            <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-2">
                <form class="needs-validation" novalidate>
                    <!-- Informações do funcionario -->
                        <legend class="mb-4">Informações do funcionario</legend>

                        <!-- nome -->
                        <div class="form-group">
                            <label for="nome" >Nome</label>
                            <input type="text" class="form-control" id="nome" name="nome"/>
                        </div>

                    <!-- Informações do usuario -->
                   
                        <legend class="mb-4">Informações do usuario</legend>

                        <!-- Usuario -->
                        <div class="form-group">
                            <label for="especialidade" >Especialidade</label>
                            <input type="text" class="form-control" id="especialidade" name="especialidade"/>
                        </div>

                        <!-- Email -->
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email"/>
                        </div>

                        <!-- Confirmar Senha -->
                        <div class="form-group">
                            <label for="lattes">Link do Lattes</label>
                            <input type="url" class="form-control" id="lattes" name="lattes"/>
                        </div>

                        <!-- Tipo de cadastro -->
                        <div class="form-group">
                            <label for="tipoDeContrato">Tipo de contrato</label>
                            <select class="form-control" id="tipoDeContrato" name="tipoDeContrato">
                                <option value="<?= tipoDeContrato::Obreiro; ?>">Obreiro</option>
                                <option value="<?= tipoDeContrato::Eventual; ?>">Eventual</option>
                                <option value="<?= tipoDeContrato::Aulista; ?>">Aulista</option>
                                <option value="<?= tipoDeContrato::Integral; ?>">Integral</option>
				<option value="<?= tipoDeContrato::Parcial; ?>">Parcial</option>
                                <option value="<?= tipoDeContrato::Seminformação; ?>">Sem informação</option>
                            </select>
                        </div>
                  

                    <!-- Botões -->
                    <div class="form-row">
                        <div class="form-group mt-4 col-sm">
                            <input class="btn btn-secondary btn-block" type="submit" value="Cadastrar Docente" />
                        </div>
                        <div class="form-group mt-sm-4 col-sm">
                            <a class="btn btn-secondary btn-block" href="../Geral/Home.php">Cancelar</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>  

        <!-- Modal de resposta -->
        <?php require_once '../Compartilhado/ModalErro.php'; ?> 

        <!-- JQuery - popper - Bootstrap-->
        <script src="../../JavaScript/jquery-3.4.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="../../bootstrap/js/bootstrap.min.js"></script> 

        <!-- Scripts Personalizados -->
        <script src="../../JavaScript/Funcionario/cadastro.js"></script>  
    </body>
</html>