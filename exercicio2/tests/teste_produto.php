<?php

require_once __DIR__ . '/../Produto.php';

echo "Testando Produto...\n";

try {
    $prod = new Produto("Monitor", 800.0, 5);
    echo "Produto criado: " . $prod->getNome() . "\n";
    $prod->reporEstoque(3);
    echo "Novo estoque: " . $prod->getEstoque() . "\n";
    $prod->vender(2);
    echo "Estoque após venda: " . $prod->getEstoque() . "\n";
    $prod->atualizarPreco(850.0);
    echo "Novo preço: " . $prod->getPreco() . "\n";
} catch (Exception $e) {
    echo "Erro: " . $e->getMessage() . "\n";
}

?>