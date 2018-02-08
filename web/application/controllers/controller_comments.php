<?php

class Controller_comments extends Controller{

    public $id;

    function __construct($db){
        $this->model = new Model_Comments($db);
    }

    function action_index(){

    }
    function action_create(){
        $uri = parse_url($_SERVER['REQUEST_URI']);

        $routes = explode('/', $uri[path]);

        $id = is_numeric($routes[3]) ? Lib::clearRequest($routes[3]) : Route::ErrorPage404();

        $this->model->create_comment($id);
    }

}