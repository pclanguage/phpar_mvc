<?php

class Controller {

     

    function load($path) {
        $page_title = $this->page_title;
        foreach ($this->data as $key => $value) {
            $$key = $value;
        }

        require_once $path . '.php';
    }

    function LoadModel($path) {
        require_once 'models/' . $path . '.php';
        $model_name = explode('/', $path);
        $model_name = ucfirst($model_name[count($model_name) - 1]);
        $this->$model_name = new $model_name();
    }

    function error_format($error, $field='') {
        $error_message = '';
        if (is_array($error)) {
            foreach ($error as $message) {
                $error_message .='<label class="error">'.$field. ' ' . $message . '</label>';
            }
        } else {
            $error_message .='<label class="error">'.$field. ' ' . $error . '</label>';
        }
        return $error_message;
    }

}

?>
