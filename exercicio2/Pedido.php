<?php

require_once __DIR__ . '/Produto.php';

class Pedido
{
    private int $numero;
    private array $itens;
    private float $valorTotal;

    public function __construct(int $numero)
    {
        $this->numero = $numero;
        $this->itens = [];
        $this->valorTotal = 0;
    }

    public function adicionarItem(Produto $produto, int $quantidade): void
    {
        if ($quantidade <= 0) {
            throw new InvalidArgumentException('Quantidade precisa ser positiva.');
        }
        if ($quantidade > $produto->getEstoque()) {
            throw new InvalidArgumentException('Estoque insuficiente para o produto ' . $produto->getNome());
        }
        $produto->vender($quantidade);
        $this->itens[] = ['produto' => $produto, 'quantidade' => $quantidade];
        $this->valorTotal += $produto->getPreco() * $quantidade;
    }

    public function removerUltimoItem(): void
    {
        if (empty($this->itens)) {
            throw new RuntimeException('Não há itens para remover.');
        }
        $ultimo = array_pop($this->itens);
        // Opcional: repor estoque se remover do pedido
        $ultimo['produto']->reporEstoque($ultimo['quantidade']);
        $this->valorTotal -= $ultimo['produto']->getPreco() * $ultimo['quantidade'];
    }

    public function getNumero(): int
    {
        return $this->numero;
    }

    public function getValorTotal(): float
    {
        return $this->valorTotal;
    }

    public function getItens(): array
    {
        return $this->itens;
    }
}

?>