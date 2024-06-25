<?php 
namespace MODEL;

class fornecedor {
    private ?int $id;
    private ?string $nome;
    private ?string $email;
    private ?string $telefone;
    private ?string $endereco;

    public function __construct()
    {
        $this->id = null;
        $this->nome = null;
        $this->email = null;
        $this->telefone = null;
        $this->endereco = null;
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

    // Getters e Setters para 'email'
    public function getEmail(): ?string {
        return $this->email;
    }

    public function setEmail(?string $email) {
        $this->email = $email;
    }

    // Getters e Setters para 'telefone'
    public function getTelefone(): ?string {
        return $this->telefone;
    }

    public function setTelefone(?string $telefone) {
        $this->telefone = $telefone;
    }

    // Getters e Setters para 'endereco'
    public function getEndereco(): ?string {
        return $this->endereco;
    }

    public function setEndereco(?string $endereco) {
        $this->endereco = $endereco;
    }
}
?>
