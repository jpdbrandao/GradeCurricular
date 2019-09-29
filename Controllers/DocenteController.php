<?php

if (!defined('__ROOT__')) {
    define('__ROOT__', dirname(__FILE__, 2));
}

require_once(__ROOT__ . '/Models/docente.php');
require_once(__ROOT__ . '/Services/FuncionarioService.php');
require_once(__ROOT__ . '/Controllers/UsuarioController.php');

if (isset($_POST["metodoDocente"])) {
    $controller = new DocenteController();
    $controller->Executar("metodoDocente");
}

class DocenteController {

    public $retorno;
    private $docenteService;


    public function __construct() {
        $this->retorno = new stdClass();
        $this->docenteService = new docenteService();
    }

    //Executa um metodo da class baseado no que foi passado por post
    public function Executar($idMetodo) {
        $metodo = $_POST[$idMetodo];
        if (method_exists($this, $metodo)) {
            $this->$metodo($_POST);
        } else {
            $this->retorno->erro = "metodo não encontrado";
        }
        
        //Retorn
        echo json_encode($this->retorno);
    }

    public function Cadastrar($dados) {
        $nome = $dados['nome'];
        $especialidade = $dados['especialidade'];
        $email = $dados[ 'email'];
        $tipoDeContrato = $dados ['tipoDeContrato'];
        $lattes = $dados['lattes'];

        try {
            $docente = new docente(null, $nome, $especialidade, $tipoDeContrato, $email, $lattes);
            $this->docenteService->Cadastrar($docente);
            $this->retorno->sucesso = "Docente cadastrado com sucesso";
        } catch (Exception $e) {
            $this->retorno->erro = $e->getMessage();
        }
    }

    public function Editar($dados) {
        $id = $dados['funcionario'];
        $nome = $dados['nome'];
        try {
            $this->usuarioController->Editar($dados);
            $funcionario = new Funcionario($id, $nome);
            $this->funcionarioService->Editar($funcionario);
            $this->retorno->sucesso = "Funcionario editado com sucesso";
        } catch (Exception $e) {
            $this->retorno->erro = $e->getMessage();
        }
    }

    public function Listar() {
        try {
            $this->retorno->lista = $this->funcionarioService->Listar();
        } catch (Exception $e) {
            $this->retorno->erro = $e->getMessage();
        }
    }

    public function Deletar($dados) {
        $id = $dados['funcionario'];
        $usuarioId = $dados['usuario'];
        try {
            $this->funcionarioService->Excluir($id);
            $this->usuarioController->getUsuarioService()->Excluir($usuarioId);
            $this->retorno->sucesso = "Funcionario deletado com sucesso";
        } catch (Exception $e) {
            $this->retorno->erro = $e->getMessage();
        }
    }

    public function GetFuncionario($dados) {
        $id = $dados['funcionario'];
        $usuarioId = $dados['usuario'];
        try {
            $usuario = $this->usuarioController->getUsuarioService()->GetUsuario($usuarioId);
            $funcionario = $this->funcionarioService->GetFuncionario($id);
            $funcionario->setUsuario($usuario);
            $this->retorno->resultado = $funcionario;
        } catch (Exception $e) {
            $this->retorno->erro = $e->getMessage();
        }
    }

    public function ListarNomes() {
        try {
            $this->retorno->lista = $this->funcionarioService->ListarNomes();
        } catch (Exception $e) {
            $this->retorno->erro = $e->getMessage();
        }
    }

}
