<?php 
namespace MODEL;

class userLogin {
    private ?int $id_user;
    private ?string $email_user;
    private ?string $senha_user;

    public function __construct()
    {
    }

    public function getIdUser() {
        return $this->id_user;
    }

    public function setIdUser(int $id_user) {
        $this->id_user = $id_user;
    }

    public function getEmailUser() {
        return $this->email_user;
    }

    public function setEmailUser(string $email_user) {
        $this->email_user = $email_user;
    }

    public function getSenhaUser() {
        return $this->senha_user;
    }

    public function setSenhaUser(string $senha_user) {
        $this->senha_user = $senha_user;
    }
}
?>