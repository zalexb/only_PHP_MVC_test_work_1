<?php

class Controller_posts extends Controller{

    public $id;

    function __construct($db){
        $this->model = new Model_Posts($db);

        $this->view = new View();
    }

    function action_index(){
        $data = $this->model->posts(5,'/posts');

        $this->view->generate('last_posts_view.php', './templates/template_view.php',$data);
    }

    function action_single(){
        $uri = parse_url($_SERVER['REQUEST_URI']);

        $routes = explode('/', $uri[path]);

        $id = is_numeric($routes[3]) ? Lib::clearRequest($routes[3]) : Route::ErrorPage404();

        $data = $this->model->single_post(5,'/posts/single/'.$id,$id);

        $this->view->generate('single_view.php', './templates/template_view.php',$data);
    }
    function action_create(){
        $this->model->create_post();
    }
}