<?php

//Funcionario é uma Pessoa
//podemos acessar o conteudo da classe base (Pessoa) atraves do uso do parent fazendo a inicialização
//atraves da classe base, evitando duplicação de codigo
//é atraves do atributo protected que deixa disponivel para uso o conteudo da classe base para as classes filhas
class Funcionario extends Pessoa
{
    private string $cargo;


    public function __construct(string $nome, CPF $cpf, string $cargo)
    {
        parent::__construct($nome,$cpf);
        $this->cargo = $cargo;
    }


    public function recuperaCargo(): string
    {
        return $this->cargo;
    }

    public function alteraNome(string $nome): void
    {
        $this->validaNomeTitular($nome);
        $this->nome = $nome;
    }


}