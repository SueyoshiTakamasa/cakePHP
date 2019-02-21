<?php
App::uses('AppController', 'Controller');

class ImagesController extends AppController {
    public $helpers = array('Html', 'Form', 'Flash');
    public $components = array('Flash');

    public function get() {
        //$filepath = DS.files.DS.'attachment'.DS.'photo'.DS;
        $filepath = Router::url();
        debug($filepath);
        $this->layout = false;
        $this->render(false);

    }
}