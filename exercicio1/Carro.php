<?php

class Carro
{
    private string $marca;
    private string $modelo;
    private int $ano;

    public function __construct(string $marca, string $modelo, int $ano)
    {
        $this->setMarca($marca);
        $this->setModelo($modelo);
        $this->setAno($ano);
    }

    public function getMarca(): string
    {
        return $this->marca;
    }

    public function setMarca(string $marca): void
    {
        $marca = trim($marca);
        if ($marca === '') {
            throw new InvalidArgumentException('Marca não pode ser vazia.');
        }
        $this->marca = $marca;
    }

    public function getModelo(): string
    {
        return $this->modelo;
    }

    public function setModelo(string $modelo): void
    {
        $modelo = trim($modelo);
        if ($modelo === '') {
            throw new InvalidArgumentException('Modelo não pode ser vazio.');
        }
        $this->modelo = $modelo;
    }

    public function getAno(): int
    {
        return $this->ano;
    }

    public function setAno(int $ano): void
    {
        $anoAtual = (int) date('Y');
        if ($ano < 1886 || $ano > $anoAtual) {
            throw new InvalidArgumentException("Ano deve estar entre 1886 e $anoAtual.");
        }
        $this->ano = $ano;
    }
}

?>
