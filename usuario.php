<?php

class Usuario
{
    private $email;
    private $password;
    private $usuario;
    private $db;

    public function __construct(Conexion $db)
    {
        $this->db = $db;
    }

    public function iniciarSesion($email, $password)
    {
        $this->email = trim($email);
        $this->password = trim($password);


        $usuarios = $this->db->consulta("SELECT * FROM usuarios as u WHERE u.email = '" . $this->email . "' AND u.password = '" . $this->password . "' LIMIT 1");

        foreach ($usuarios as $u) {
            $this->usuario = $u;
        }

        return $this->usuario;
    }

    public function cerrarSesion()
    {
        session_destroy();
    }
}

?>