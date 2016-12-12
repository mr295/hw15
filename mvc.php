<?php
  
  class Model
  {
    public $number;
    
    public $reset;
    
    public function __construct(){
        $this->number = "12";
        $this->reset = "Click here to see Today's number.";
    }
  }
  
  class View
  {
    private $model;
    
    private $controller;
    
    public function __construct($controller,$model) {
        $this->controller = $controller;
        $this->model = $model;
    }
    
    public function output() {

      return '<a href="mvc.php?action=clicked" rel="nofollow">'.$this->model->reset."</a>";
    }
  }
  
  class Controller
  {
    private $model;
    
    public function __construct($model){
        $this->model = $model;
    }
    public function clicked() {
        $this->model->number = "07";
    }
  }
  
  echo '<h3>Homework 15: MVC Application</h3>';
  
  $model = new Model();
  
  echo 'Hi, Click below to know your lucky number for Today.<br>';
  
  echo 'Your lucky number for Yesterday Was: ' . "$model->number" . '<br><br>';;
  
  $controller = new Controller($model);
  
  $view = new View($controller, $model);
  
  if(isset($_GET['action']) && !empty($_GET['action'])){
    $controller = $controller->$_GET['action']();
  }
  
  echo $view->output();
  echo '<br><br>Woohoo!, Your lucky number Today is:<br>';
  echo "$model->number";
?>