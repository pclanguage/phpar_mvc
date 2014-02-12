 
<table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
        <th>Book ID</th>
        <th>Name</th>
        <th>Author</th>
        <th>Author</th>
    </tr>
    <?php
    foreach ($books as $book) {
        $book = $book->attributes();
        ?>
        <tr>
            <td><?php echo $book['id']; ?></td>
            <td><?php echo $book['name']; ?></td>
            <td><?php echo $book['author']; ?></td>
            <td> <a href="<?php echo BASE_URL; ?>index.php?book/book_images/set_id/<?php echo $book['id']; ?>"> Images </a> | 
                <a href="<?php echo BASE_URL; ?>index.php?book/books/view/<?php echo $book['id']; ?>">View </a> | 
                <a href="<?php echo BASE_URL; ?>index.php?book/books/edit/<?php echo $book['id']; ?>">Edit </a> | 
                <a href="<?php echo BASE_URL; ?>index.php?book/books/delete/<?php echo $book['id']; ?>">Delete </a>  

        </tr>

    <?php } ?>

</table>
<a href="<?php echo BASE_URL; ?>index.php?book/books/add">Add  </a> 

