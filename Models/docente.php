<?php

class Docente implements JsonSerializable {// criação da classe

    private $id;// declaração das variaveis
    private $nome;// declaração das variaveis
    private $especialidade;// declaração das variaveis
    private $contrato;// declaração das variaveis
    private $email;// declaração das variaveis
    private $lattes;// declaração das variaveis


    public function __get($name) {
        return $this->$name;
    }// retorno da variavel

    public function __construct($id = 0, $nome = "",$especialidade ="", $contrato = 0 , $email = "", $lattes = ""){// função da construção
        $this->id = $id;//declaracao da funcao construçao
        $this->nome = $nome;//declaracao da funcao construçao
        $this->especialidade= $especialidade;//declaracao da funcao construçao
        $this->contrato= $contrato;//declaracao da funcao construçao
        $this->email= $email;//declaracao da funcao construçao
        $this->lattes = $lattes;//declaracao da funcao construçao
    }

    public function jsonSerialize() {
        return get_object_vars($this);// Retorno da implementação do jsonSerialize
    }

}
