<?php
/*ejemplo usando get and set method
   Realiza un programa que implemente un usuario con usuario y password
   Se puede crear un objeto sin pasar password, en cuyo caso se asignará el mismo password que usuario
   El password ha de tener un mínimo de 8 caracteres y al menos un número
   Si no se crea la password se generará un mensaje de que no se ha podido crear el usuario con dichas credenciales*/

class Usuario
{
    private $usuario;
    private $pass;
    private $error;

    public function __construct(string $usuario, string $pass = null)
    {
        $this->error = null;
        $this->usuario = $usuario;

        $this->pass = $this->check_pass($pass); //devuelve false or true.
        //?¿?¿?¿?¿??¿?¿¿?¿?¿? Se setea $pass si $check_pass es true
        //es por el sett pass que tambien checkea?¿
        if (!is_null($this->error)) {
            $this->show_error();
        }

    }

    public function check_pass($pass)
    {
        $pass_valida = true;
        if (is_null($pass))
            $pass = $this->usuario;
        if (strlen($pass < 8)) { //strlen cheecke la longitud del string
            $pass_valida = false;
            $this->error = "La pass ha de ser mínimo 8 caracteres";
        }
        //elimina todos los numeros de la contraseña
        // y si es igual que la proporcionada es que no has intro ningún num
        $pass2 = str_replace([0, 1, 2, 3, 4, 5, 6, 7, 8, 9], "", $pass);
        if ($pass == $pass2) {
            $pass_valida = false;
            $this->error = "La contraseña debe contener al menos un número.";
        }
        return $pass_valida; //devolvemos si la pass es valida
    }

    public function show_error()
    {
        return  $this->error;
    }
    /**
     * @return string
     */
    public function getUsuario(): string
    {
        return $this->usuario;
    }

    /**
     * @param string $user
     */
    public function setUsuario(string $usuario): void
    {
        $this->usuario = $usuario;
    }

    /**
     * @return mixed
     */
    public function getPass()
    {
        return $this->pass;
    }

    /**
     * @param mixed $pass
     */
    public function setPass($pass): void
    {
        if ($this->check_pass($pass))
            $this->pass = $pass;
    }

    /**
     * @return null
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * @param null $error
     */
    public function setError($error): void
    {
        $this->error = $error;
    }

}