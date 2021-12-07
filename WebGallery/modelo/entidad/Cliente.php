<?php


class Cliente
{

    private $idCliente;
    private $nombre;
    private $apellidos;
    private $email;
    private $password;
    private $telefono;

    public function __construct($idCliente, $nombre, $apellidos, $email, $password, $telefono)
    {
        $this->idCliente = $idCliente;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->email = $email;
        $this->password = $password;
        $this->telefono = $telefono;
    }

    public function getIdCliente()
    {
        return $this->idCliente;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getApellidos()
    {
        return $this->apellidos;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }

    public function setIdCliente($idCliente)
    {
        $this->idCliente = $idCliente;

        return $this;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }
}
