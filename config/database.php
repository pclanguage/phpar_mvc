<?php

// initialize ActiveRecord
// change the connection settings to whatever is appropriate for your mysql server 
ActiveRecord\Config::initialize(function($cfg)
{
    $cfg->set_model_directory('.');
     $cfg->set_connections(array('development' => 'mysql://root:@127.0.0.1/active_record'));
});
?>
