<?php
class Produto
{
    private string $nome;
    private float $preco;
    private int $estoque;

    public function __construct(string $nome, float $preco, int $estoque)
    {
        $nome = trim($nome);
        if ($nome === '') {
            throw new InvalidArgumentException('O nome do produto não pode ser vazio.');
        }
        if ($preco <= 0) {
            throw new InvalidArgumentException('O preço deve ser maior que zero.');
        }
        if ($estoque < 0) {
            throw new InvalidArgumentException('O estoque não pode ser negativo.');
        }

        $this->nome = $nome;
        $this->preco = $preco;
        $this->estoque = $estoque;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getPreco(): float
    {
        return $this->preco;
    }

    public function getEstoque(): int
    {
        return $this->estoque;
    }

    public function atualizarPreco(float $novoPreco): void
    {
        if ($novoPreco <= 0) {
            throw new InvalidArgumentException('O preço deve ser positivo.');
        }
        $this->preco = $novoPreco;
    }

    public function reporEstoque(int $quantidade): void
    {
        if ($quantidade <= 0) {
            throw new InvalidArgumentException('Quantidade precisa ser positiva.');
        }
        $this->estoque += $quantidade;
    }

    public function vender(int $quantidade): void
    {
        if ($quantidade <= 0) {
            throw new InvalidArgumentException('Quantidade precisa ser positiva.');
        }
        if ($quantidade > $this->estoque) {
            throw new InvalidArgumentException('Estoque insuficiente.');
        }
        $this->estoque -= $quantidade;
    }
}

?>