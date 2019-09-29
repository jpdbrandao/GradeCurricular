<?php //define o documento como codigo php
require_once '../../Models/Enum/TipoDeContrato.php'; // incluindo nesse arquivo o numerador
?>
<!--fechamento do codigo php-->

<!DOCTYPE html> <!-- definindo o documento como html5 -->
<html lang="pt-br">
<!-- abertura do documento html e definição do idioma como pt-br -->

<head>
    <!-- aberturada tag head -->
    <!-- Required meta tags -->
    <meta charset="UTF-8"> <!-- definindo o charset como UTF-8 -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> <!-- metadado para adaptação no mobile -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css"> <!-- incluindo o bootstrap -->

    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../fontawesome/css/all.min.css"> <!-- incluindo fontawesome -->

    <!-- Estilo persinalizado -->
    <link rel="stylesheet" href="../../Css/estilo.css"> <!-- incluindo estilo personalizado -->

    <title>Cadastrar - Funcionario</title> <!-- definindo o titulo da pagina -->
</head> <!-- fechamento da tag head -->

<body>
    <!-- abertura do corpo da pagina -->
    <!-- Area da lista -->
    <div id="area-principal" class="container bg-primary">
        <!-- criando a divisção para o conteudo principal -->

        <input type="hidden" id="nivelAcessoAtivo" value="<?= $usuario->nivelAcesso ?>"> <!-- colocando na pagina qual o nivel de acesso da usuario atual -->

        <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-2">
            <!-- cirando uma divisão pro formulario -->
            <form class="needs-validation" novalidate>
                <!-- abrindo a tag de formulario -->
                <!-- Informações do funcionario -->

                <!-- nome -->
                <div class="form-group">
                    <!-- criando a divpro input do nome-->
                    <label for="nome">Nome</label> <!-- texto para nomear o input -->
                    <input type="text" class="form-control" id="nome" name="nome" /> <!-- criar um input pra receber o nome -->
                </div>

                <!-- Informações do usuario -->


                <!-- Usuario -->
                <div class="form-group">
                    <!-- input de nome -->
                    <label for="especialidade">Especialidade</label> <!-- label para dizer o que tem queser digitado no input -->
                    <input type="text" class="form-control" id="especialidade" name="especialidade" /> <!-- definindo o input para a especialidade -->
                </div>

                <!-- Email -->
                <div class="form-group">
                    <!-- input de email -->
                    <label for="email">Email</label> <!-- label para dizer o que tem queser digitado no input -->
                    <input type="email" class="form-control" id="email" name="email" /> <!-- definindo o input para o email -->
                </div>

                <!-- Confirmar Senha -->
                <div class="form-group">
                    <!-- area para o input de senha -->
                    <label for="lattes">Link do Lattes</label> <!-- label para dizer o que tem queser digitado no input -->
                    <input type="url" class="form-control" id="lattes" name="lattes" /> <!-- definindo o input para a senha -->
                </div>

                <!-- Tipo de cadastro -->
                <div class="form-group">
                    <!-- area para tipo de contratos-->
                    <label for="TipoDeContrato">Tipo de contrato</label> <!-- label para dizer o que é pra ser digitado no input -->
                    <select class="form-control" id="TipoDeContrato" name="TipoDeContrato"> <!-- select para o tipo de contrato -->
                        <option value="<?= TipoDeContrato::Obreiro; ?>">Obreiro</option> <!-- tipo de contrato é obreiro -->
                        <option value="<?= TipoDeContrato::Eventual; ?>">Eventual</option> <!-- tipo de contrato é eventual -->
                        <option value="<?= TipoDeContrato::Aulista; ?>">Aulista</option> <!-- tipo de contrato é aulista -->
                        <option value="<?= TipoDeContrato::Integral; ?>">Integral</option> <!-- tipo de contrato é integral -->
                        <option value="<?= TipoDeContrato::Parcial; ?>">Parcial</option> <!-- tipo de contrato é parcial -->
                        <option value="<?= TipoDeContrato::Seminformação; ?>">Sem informação</option> <!-- sem informacao do tipo de contrato -->
                    </select>
                </div>


                <!-- Botões -->
                <div class="form-row">
                    <div class="form-group mt-4 col-sm">
                        <input class="btn btn-secondary btn-block" type="submit" value="Cadastrar Docente" /> <!-- botão que valida o cadastro -->
                    </div>
                    <div class="form-group mt-sm-4 col-sm">
                        <a class="btn btn-secondary btn-block" href="../Geral/Home.php">Cancelar</a> <!-- botão (link) que volta para a home -->
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal de resposta -->
    <?php require_once '../Compartilhado/ModalErro.php'; ?> <!-- modal de erro -->

    <!-- JQuery - popper - Bootstrap-->
    <script src="../../JavaScript/jquery-3.4.1.min.js"></script> <!-- importação do JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script> <!-- importação do popper (requisito do bootstrap) -->
    <script src="../../bootstrap/js/bootstrap.min.js"></script> <!-- importação do bootstrap -->

    <!-- Scripts Personalizados -->
    <script src="../../JavaScript/Funcionario/cadastro.js"></script> <!-- importação dos scripts personalizados -->
</body>

</html>