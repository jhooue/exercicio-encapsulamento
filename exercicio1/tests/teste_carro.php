<?php 

require_once __DIR__ . '/../Carro.php';

echo "Teste de criação do carro<br>";
try {
    $carro = new Carro("Fiat", "Uno", 2015);
    echo "Marca: " . $carro->getMarca() . "<br>";
    echo "Modelo: " . $carro->getModelo() . "<br>";
    echo "Ano: " . $carro->getAno() . "<br>";
} catch (Exception $e) {
    echo "Falhou: " . $e->getMessage() . "<br>";
}

echo "<br>Alterando valores<br>";
try {
    $carro->setMarca("Chevrolet");
    $carro->setModelo("Onix");
    $carro->setAno(2021);
    echo "Marca alterada: " . $carro->getMarca() . "<br>";
    echo "Modelo alterado: " . $carro->getModelo() . "<br>";
    echo "Ano alterado: " . $carro->getAno() . "<br>";
} catch (Exception $e) {
    echo "Falhou: " . $e->getMessage() . "<br>";
}

echo "<br>Teste marca vazia<br>";
try {
    $carro->setMarca("");
    echo "Falhou: marca vazia foi aceita!<br>";
} catch (Exception $e) {
    echo "OK, pegou erro esperado: " . $e->getMessage() . "<br>";
}

echo "<br>Teste de modelo vazio<br>";
try {
    $carro->setModelo("   ");
    echo "Falhou: modelo vazio foi aceito!<br>";
} catch (Exception $e) {
    echo "OK, pegou erro esperado: " . $e->getMessage() . "<br>";
}

echo "<br>Teste dp ano fora do intervalo<br>";
try {
    $carro->setAno(1500);
    echo "Falhou: ano inválido foi aceito!<br>";
} catch (Exception $e) {
    echo "OK, pegou erro esperado: " . $e->getMessage() . "<br>";
}

?>