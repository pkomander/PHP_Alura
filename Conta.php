<?php

class Conta
{
    //definir os dados da conta = atributos
    private $titular;
    private $saldo = 0;
    private static $numeroDeContas = 0;//atributo da classe em si para conta estatica de numeros de contas

    //metodo constructor e utilizado para inicializar um objeto já com seus atributos
    //como saldo = 0 e fazendo necessario passar nome e cpf do titular ao criar um objeto do tipo conta
    public function __construct(Titular $titular)
    {
        $this->titular = $titular;
        $this->saldo = 0;

        self::$numeroDeContas++;//self se refere a classe Conta em si
    }

    public function __destruct()
    {
        if (self::$numeroDeContas > 2) {
            echo "Há mais de uma conta ativa";
        }
    }

    //function dentro de uma classe e chamada de método
    //já que o método não tem retorno o podemos fazer o early return e retirar o else dos métodos
    public function saca(float $valorASacar): void
    {
        if ($valorASacar > $this->saldo) {
            echo "Saldo indisponivel";
            return;
        }

        $this->saldo -= $valorASacar;

    }

    public function deposita(float $valorADepositar): void
    {
        if ($valorADepositar < 0) {
            echo "Valor precisa ser positivo";
            return;
        }

        $this->saldo += $valorADepositar;
//        } else {
//            $this->saldo += $valorADepositar;
//        }
    }

    public function transfere(float $valorATransferir, Conta $contaDestino): void
    {
        if($valorATransferir > $this->saldo){
            echo "Saldo indisponivel";
            return;
        }

        $this->sacar($valorATransferir);
        $contaDestino->depositar($valorATransferir);

    }

    //metodo para retorno do saldo já que é um atributo publico
    public function recuperaSaldo(): float
    {
        return $this->saldo;
    }

    public function recuperaNomeTitular(): string
    {
        return $this->titular->recuperaNome();
    }

    public function recuperaCpfTitular(): string
    {
        return $this->titular->recuperaCpf();
    }

    //recuperando o numero de contas atraves do metodo
    public static function recuperaNumeroDeContas(): int
    {
        return self::$numeroDeContas;
    }

}