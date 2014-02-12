<?php

class Books extends AppController {

    //----------------------- index -------------------------------------
    function index() {
        $this->data['page_title'] = 'Book List';

        $this->LoadModel('book/book');
        $options = array('limit' => 10);
        $this->data['books'] = $this->Book->find('all', $options);

        $this->data['content'] = 'book/books/index';
        $this->load($this->layout);
    }

    function view($id='') {
        $this->data['page_title'] = 'View Book ';
        $this->LoadModel('book/book');
        $this->data['book'] = $this->Book->find($id)->attributes();
        $this->data['content'] = 'book/books/view';
        $this->load($this->layout);
    }

    function edit($id='') {
        $this->data['page_title'] = 'Edit Book ';
        $this->LoadModel('book/book');
        if (isset($_POST['btnAction'])) {
            $book = $this->Book->find($id);
            $book->id = $_POST['id'];
            $book->name = $_POST['name'];
            $book->author = $_POST['author'];
            $book->save();
            if ($book->save()) {
                header('location:' . BASE_URL . 'index.php?book/books');
            } else {
                $this->data['title_error'] = $this->error_format($book->errors->on('name'), 'Name');
            }
        }

        $this->data['book'] = $this->Book->find($id)->attributes();
        $this->data['content'] = 'book/books/edit';
        $this->load($this->layout);
    }

    function add($id='') {
        $this->data['page_title'] = 'Add Book ';
        $this->LoadModel('book/book');
        if (isset($_POST['btnAction'])) {

            $book = new Book();
            $book->name = $_POST['name'];
            $book->author = $_POST['author'];
            if ($book->save()) {
                header('location:' . BASE_URL . 'index.php?book/books');
            } else {
                $this->data['title_error'] = $this->error_format($book->errors->on('name'), 'Name');
            }
        }


        $this->data['content'] = 'book/books/add';
        $this->load($this->layout);
    }

    function delete($id='') {
        $this->LoadModel('book/book');
        $book = $this->Book->find($id);
        $book->delete();
        header('location:' . BASE_URL . 'index.php?book/books');
    }

}

?>
