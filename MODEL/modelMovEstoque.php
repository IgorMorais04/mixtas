<?php 
namespace MODEL;

class movEstoque {
    private ?int $id;
    private ?string $nome;
    private ?string $categoria;
    private ?float $valor;
    private ?string $imagem; // String para armazenar conteúdo binário da imagem

    public function __construct()
    {
        $this->id = null;
        $this->nome = null;
        $this->categoria = null;
        $this->valor = null;
        $this->imagem = null;
    }

    // Getters e Setters para 'id'
    public function getId(): ?int {
        return $this->id;
    }

    public function setId(?int $id) {
        $this->id = $id;
    }

    // Getters e Setters para 'nome'
    public function getNome(): ?string {
        return $this->nome;
    }

    public function setNome(?string $nome) {
        $this->nome = $nome;
    }

    // Getters e Setters para 'categoria'
    public function getCategoria(): ?string {
        return $this->categoria;
    }

    public function setCategoria(?string $categoria) {
        $this->categoria = $categoria;
    }

    // Getters e Setters para 'valor'
    public function getValor(): ?float {
        return $this->valor;
    }

    public function setValor(?float $valor) {
        $this->valor = $valor;
    }

    // Getters e Setters para 'imagem'
    public function getImagem(): ?string {
        return $this->imagem;
    }

    public function setImagem(?string $imagem) {
        $this->imagem = $imagem;
    }
}
?>
