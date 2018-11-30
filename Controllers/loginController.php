<?php
class loginController extends Controller{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        // TODO: Implement index() method.
    }
    public function salir()
    {
        Session::destroy();
        $this->redireccionar("index");
    }
}