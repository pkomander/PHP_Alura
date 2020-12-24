<?php

require_once '..\src\Conta.php';
require_once '..\src\Titular.php';
require_once '..\src\CPF.php';
//caso queira executar sem o phpstorm = php banco.php

$vinicius = new Titular(new CPF('123.456.789-10'), 'Vinicius Dias');
$primeiraConta = new Conta($vinicius);
var_dump($primeiraConta);
$primeiraConta->deposita(500);
$primeiraConta->saca(300);//isso é ok

echo $primeiraConta->recuperaNomeTitular() . PHP_EOL;
echo $primeiraConta->recuperaCpfTitular() . PHP_EOL;
echo $primeiraConta->recuperaSaldo() . PHP_EOL;

$patricia = new Titular(new CPF('987.654.321.10'), 'Patricia');
$segundaConta = new Conta($patricia);
var_dump($segundaConta);

echo Conta::recuperaNumeroDeContas();