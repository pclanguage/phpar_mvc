 
<table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
        <th> ID</th>
        <th>Caption</th>
        <th>Image</th>
        <th>Action</th>
    </tr>
    <?php
    foreach ($book_images as $image) {
        $image = $image->attributes();
          $image_path=   'uploads/books/' . $_SESSION['book_id'].'/'. $image['id'].'/thumb_'.$image['imagename'];
          
        ?>
        <tr>
            <td><?php echo $image['id']; ?></td>
            <td><?php echo $image['caption']; ?></td>
            <td>  <img   src="<?php echo BASE_URL.$image_path; ?>" /></td>
            <td> 
                <a href="<?php echo BASE_URL; ?>index.php?book/book_images/view/<?php echo $image['id']; ?>">View </a> | 
                <a href="<?php echo BASE_URL; ?>index.php?book/book_images/edit/<?php echo $image['id']; ?>">Edit </a> | 
                <a href="<?php echo BASE_URL; ?>index.php?book/book_images/delete/<?php echo $image['id']; ?>">Delete </a>  

        </tr>

    <?php } ?>

</table>
<a href="<?php echo BASE_URL; ?>index.php?book/book_images/add">Add  </a>   

