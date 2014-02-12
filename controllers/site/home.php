<?php

class Home extends AppController {

    //----------------------- index -------------------------------------
    function index() {
        $this->data['content'] = 'site/home/index';
        $this->load($this->layout);
    }

}

?>
