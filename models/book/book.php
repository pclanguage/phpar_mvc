<?php

class Book extends ActiveRecord\Model {
    static $validates_presence_of = array(
     array('name')
   );
    
//    static $has_many = array(
//       array('Book_image')
//    );
}

?>
