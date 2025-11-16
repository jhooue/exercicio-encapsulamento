<?php

require_once __DIR__ . '/../Produto.php';
require_once __DIR__ . '/../Pedido.php';

echo "Testando Pedido...\n";

try {
    $p1 = new Produto("Mouse", 80, 3);
    $p2 = new Produto("Teclado", 120, 2);

    $pedido = new Pedido(101);
    $pedido->adicionarItem($p1, 2);
    $pedido->adicionarItem($p2, 1);

    echo "Número do pedido: " . $pedido->getNumero() . "\n";
    echo "Valor total: R$ " . $pedido->getValorTotal() . "\n";
    foreach ($pedido->getItens() as $item) {
        echo $item['produto']->getNome() . " x " . $item['quantidade'] . "\n";
    }

    $pedido->removerUltimoItem();
    echo "Valor após remover último item: R$ " . $pedido->getValorTotal() . "\n";
} catch (Exception $e) {
    echo "Erro: " . $e->getMessage() . "\n";
}

?>