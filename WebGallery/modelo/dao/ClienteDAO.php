<?php

require_once("DataSource.php");
require_once(__DIR__ . "/../entidad/Cliente.php");

class ClienteDAO
{

    public function registrarCliente(Cliente $cliente)
    {
        $data_source = new DataSource();

        $data_table = $data_source->ejecutarConsulta("SELECT * FROM cliente where email = :correo", array(':correo' => $cliente->getEmail()));

        if (count($data_table) != 0) return -1;


        $data_source = new DataSource();
        $sql = "INSERT INTO cliente VALUES (NULL,:nombre,:apellidos,:email,:password,:telefono)";

        $resultado = $data_source->ejecutarActualizacion(
            $sql,
            array(
                ':nombre' => $cliente->getNombre(),
                ':apellidos' => $cliente->getApellidos(),
                ':email' => $cliente->getEmail(),
                ':password' => $cliente->getPassword(),
                ':telefono' => $cliente->getTelefono()
            )
        );

        return $resultado;
    }

    public function autenticarCliente($correo, $password)
    {

        $data_source = new DataSource();

        $data_table = $data_source->ejecutarConsulta("SELECT * FROM cliente WHERE email =:correo", array(':correo' => $correo));

        $cliente = null;

        if (count($data_table) == 1 && password_verify($password, $data_table[0]["password"])) {

            foreach ($data_table as $indice => $valor) {

                $cliente = new Cliente(
                    $data_table[$indice]["idCliente"],
                    $data_table[$indice]["nombre"],
                    $data_table[$indice]["apellidos"],
                    $data_table[$indice]["email"],
                    $data_table[$indice]["password"],
                    $data_table[$indice]["telefono"]
                );
            }
        }
        return $cliente;
    }
}
