<?php

if (!defined('__ROOT__')) {
    define('__ROOT__', dirname(__FILE__, 2));
}

require_once(__ROOT__ . '/Models/docente.php');// chamada do model docente
require_once(__ROOT__ . '/Services/Connection.php');// chamada do service

class docenteService {// criação de classe

    private $conn;// declaração das variaveis

    public function __construct() {// função construçao
        $this->conn = new Connection();
    }

    public function Cadastrar(docente $docente) {// funçao cadastrar
        $query = "INSERT INTO docente VALUES (:id, :nome, :especialidade, :contrato, :email, :lattes)";// inserçao de parametros do model docente na variavel

        $stmt = $this->conn->Conectar()->prepare($query);
        $stmt->bindValue(':id', $docente->id); // declara o tipo de variavel constante
        $stmt->bindValue(':nome', $docente->nome);// declara o tipo de variavel constante
        $stmt->bindValue(':especialidade;', $docente->especilidade);// declara o tipo de variavel constante
        $stmt->bindValue(':contrato', $docente->contrato);// declara o tipo de variavel constante
        $stmt->bindValue(':email', $docente->email);// declara o tipo de variavel constante
        $stmt->bindValue(':lattes', $docente->lattes);// declara o tipo de variavel constante
        
        if (!$stmt->execute()) {
            throw new Exception("Erro ao tentar cadastrar o Docente");// exibir mensagem de erro
        }
    }

    public function Editar(Funcionario $funcionario) {// funçao editar
        $query = "UPDATE funcionario SET Nome = :nome WHERE Id = :id";// ediçao de parametros do model docente

        $stmt = $this->conn->Conectar()->prepare($query);
        $stmt->bindValue(':id', $funcionario->id);// declara o tipo de variavel constante
        $stmt->bindValue(':nome', $funcionario->nome);// declara o tipo de variavel constante
        if (!$stmt->execute()) {
            throw new Exception("Erro ao tentar editar o funcionario");// exibir mensagem de erro
        }
    }

    public function Listar() {// listar os parametros do model docente
        $query = "SELECT "// seleção 
                . "f.Id, f.Nome, f.UsuarioId, u.NivelAcesso "// seleção da informação do usiurio 
                . "FROM funcionario f "// reconhecimento como funcionario
                . "LEFT JOIN usuario u ON f.UsuarioId = u.Id";// chmada da id
        
        $stmt = $this->conn->Conectar()->prepare($query);
        // conectar, e preparar
        $stmt->execute();
        // exercução da tag
        return $stmt->fetchAll(PDO::FETCH_OBJ);
        //retona o comando
    }

    public function Excluir($id) {// excluir parametros do model
        $query = "DELETE FROM funcionario WHERE Id = :id"; // parametros do id para delete
        
        $stmt = $this->conn->Conectar()->prepare($query);
        $stmt->bindValue(':id', $id);// comparaçao dos dados
        
        if (!$stmt->execute()) {
            throw new Exception("Não é possivel excluir um funcionario com atendimentos registrados");
        }// mensagem de erro
    }

    public function GetFuncionario(int $id) {
        $query = "SELECT Id, Nome FROM funcionario WHERE Id = :id";

        $stmt = $this->conn->Conectar()->prepare($query);
        $stmt->bindValue(':id', $id);// declara o tipo de variavel constante

        $stmt->execute();
        $resultado = $stmt->fetch(PDO::FETCH_OBJ);
        
        if (empty($resultado)) {
            throw new Exception("Funcionario não encontrado");
        }
        
        return new Funcionario($resultado->Id, $resultado->Nome);// retorna o ID e nome do funcionário
    }

    public function ListarNomes() {// funçao para listar os nomes dos funcionarios cadastrados
        $query = "SELECT Id, Nome, UsuarioId FROM funcionario ORDER BY Nome";
        $stmt = $this->conn->Conectar()->prepare($query);

        $stmt->execute();// exercuçao das $query

        return $stmt->fetchAll(PDO::FETCH_OBJ); // retorno
    }

}
