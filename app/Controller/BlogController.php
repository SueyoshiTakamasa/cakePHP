<?php
App::uses('AppController', 'Controller');
 
class BlogController extends AppController {
 
  public function index() {
    $this->autoLayout = false;
  }
}