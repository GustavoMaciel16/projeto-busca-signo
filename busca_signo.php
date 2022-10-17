<?php

$signos = simplexml_load_file('signo.xml');
$data = $_POST['data'];
$nome = $_POST['nome'];
$data = explode('-', $data);
$dataSemAno = $data[1] . "/" . $data[2];

foreach ($signos->signo as $signo) {
    $dataInicioFormatada = explode('/', $signo->dataInicio);
    $dataInicioFormatada = $dataInicioFormatada[1] . "/" . $dataInicioFormatada[0];
    $dataFinalFormatada = explode('/', $signo->dataFim);
    $dataFinalFormatada = $dataFinalFormatada[1] . "/" . $dataFinalFormatada[0];

    if (strtotime($dataSemAno) >= strtotime($dataInicioFormatada) && strtotime($dataSemAno) <= strtotime($dataFinalFormatada)) {
        echo "Olá, <b>$nome!</b> <br>";
        echo "Seu signo é: <b>$signo->signoNome.</b>";
        echo "<br/><br/>Informações sobre seu signo: " . $signo->descricao;
    }
}
