<?php

require 'models/User.php';
require 'models/Estado.php';
require 'models/Cargo.php';

class UserController
{
    private $model;
    private $estado;
    private $cargo;

    public function  __construct()
    {
        $this->model  = new User;
        $this->estado = new Estado;
        $this->cargo =  new Cargo;

    }

    public function index(){

        $users = $this->model->getAll();
        require 'views/layout.php';
        require 'views/User/list.php';
    }

    public function save(){
        $this->model->newUser($_REQUEST);
        header("Location: ?controller=user");
    }

    public function edit(){

			
		if (isset($_REQUEST['idUsuario'])) {
			$id   = $_REQUEST['idUsuario'];
			$data = $this->model->getUserById($id);
                 
            $estados  = $this->estado->getAll();
            $cargos   = $this->cargo->getAll();
            
			
			require 'views/layout.php';
			require 'views/User/edit.php';
		} else {
			echo "Error";
		}
							
    }


       
}