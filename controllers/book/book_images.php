<?php

use PHPImageWorkshop\ImageWorkshop;

class Book_images extends AppController {

    //----------------------- index -------------------------------------
    function index() {
        $this->data['page_title'] = 'Book Images';

        $this->LoadModel('book/book_image');
        $options = array('limit' => 10, 'conditions' => array('book_id' => $_SESSION['book_id']));
        $this->data['book_images'] = $this->Book_image->find('all', $options);

        $this->data['content'] = 'book/book_images/index';
        $this->load($this->layout);
    }

    function set_id($id='') {
        $_SESSION['book_id'] = $id;
        header('location:' . BASE_URL . 'index.php?book/book_images');
    }

    function view($id='') {
        $this->data['page_title'] = 'View Book ';
        $this->LoadModel('book/book_image');
        $this->data['book_image'] = $this->Book_image->find($id)->attributes();
        $this->data['content'] = 'book/book_images/view';
        $this->load($this->layout);
    }

    function edit($id='') {
        $this->data['page_title'] = 'Edit Book ';
        $this->LoadModel('book/book_image');
        if (isset($_POST['btnAction'])) {
            $imagename = $this->image_upload($_SESSION['book_id'], $id);

            //print_r($imagename);

            $book = $this->Book_image->find($id);
            if (isset($imagename['imagename']) && $imagename['imagename']) {
                $imagename = $imagename['imagename'];
            } else {
                $imagename = $book->imagename;
            }
//echo $imagename; 
//print_r($_POST);
            $book->id = $_POST['id'];
            $book->caption = $_POST['caption'];
            $book->imagename = $imagename;
            $book->save();

            header('location:' . BASE_URL . 'index.php?book/book_images');
        }

        $this->data['book_image'] = $this->Book_image->find($id)->attributes();
        $this->data['content'] = 'book/book_images/edit';
        $this->load($this->layout);
    }

    function add($id='') {
        $this->data['page_title'] = 'Add Book ';
        $this->LoadModel('book/book_image');
        if (isset($_POST['btnAction'])) {


            $book = new Book_image();
            $book->caption = $_POST['caption'];
            $book->book_id = $_SESSION['book_id'];
            $book->save();
            $insered = $book->values_for_pk();
            $last_inserted_id = $insered['id'];


            $image_upload = $this->image_upload($_SESSION['book_id'], $last_inserted_id);
            if (isset($image_upload['imagename']) && $image_upload['imagename']) {
                $imagename = $image_upload['imagename'];
            } else {
                $imagename = '';
            }
            $book->id = $last_inserted_id;
            $book->imagename = $imagename;
            $book->save();


            header('location:' . BASE_URL . 'index.php?book/book_images');
        }


        $this->data['content'] = 'book/book_images/add';
        $this->load($this->layout);
    }

    function delete($id='') {
        $this->LoadModel('book/book_image');
        $book = $this->Book_image->find($id);
        $book->delete();
        header('location:' . BASE_URL . 'index.php?book/book_images');
    }

    function image_upload($book_id='', $id='') {

        $imagename['imagename'] = '';
        if ($id) {
            if ($_FILES['fileToUpload']['name']) {
                if ($_FILES['fileToUpload']['error'] > 0) {
                    $imagename['error'] = "Error: " . $_FILES['fileToUpload']['error'] . "<br />";
                } else {
                    // array of valid extensions
                    $validExtensions = array('.jpg', '.jpeg', '.gif', '.png');
                    // get extension of the uploaded file
                    $fileExtension = strrchr($_FILES['fileToUpload']['name'], ".");
                    // check if file Extension is on the list of allowed ones
                    if (in_array($fileExtension, $validExtensions)) {
                        // we are renaming the file so we can upload files with the same name
                        // we simply put current timestamp in fron of the file name
                        $newName = time() . '_' . strtolower($_FILES['fileToUpload']['name']);
                        $folder = IMAGE_DIR . 'books/' .$book_id . '/' . $id;
                        $this->_create_directory($folder, true);

                        $destination = $folder . '/' . $newName;
                        if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $destination)) {

                            //image thumb
                            $this->image_resize($folder, $destination, $newName, 'thumb');
                            //image long
                            $this->image_resize($folder, $destination, $newName, 'long');
                            $imagename['imagename'] = $newName;
                        }
                    } else {
                        $imagename['error'] = 'You must upload an image...';
                    }
                }
            }
        }
        return $imagename;
    }

    function image_resize($folder, $destination, $newName, $type='') {
        if ($type) {

            $layer = ImageWorkshop::initFromPath($destination);
            $layer->resizeInPixel($this->image_size[$type]['width'], $this->image_size[$type]['height']);
            $temp_image_name = $type . '_' . $newName;
            $layer->save($folder, $temp_image_name);
        }
    }

    function _create_directory($folder, $delete_existance=false) {
         $folder = str_replace('/', "\\", $folder);
        if ($delete_existance) {
            $this->_delete_dir($folder);
        }
        if (!is_dir($folder)) {
            $oldUmask = umask(0);
            mkdir($folder, 0777, true);
            umask($oldUmask);
            chmod($folder, 0777);
        }
    }

    function _delete_dir($dir) {
        if (!file_exists($dir)) {
        $it = new RecursiveDirectoryIterator($dir);
        $files = new RecursiveIteratorIterator($it,   RecursiveIteratorIterator::CHILD_FIRST);
        foreach ($files as $file) {
            if ($file->getFilename() === '.' || $file->getFilename() === '..') {
                continue;
            }
            if ($file->isDir()) {
                rmdir($file->getRealPath());
            } else {
                unlink($file->getRealPath());
            }
        }
        rmdir($dir);
        }
        else return true;
    }

}

?>
