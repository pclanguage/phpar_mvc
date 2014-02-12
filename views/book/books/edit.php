<div>
    <form method="post" action="">
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr> <td>Book ID</td><td><input type="text" name="id" value="<?php echo $book['id']; ?>" /></td></tr>
            <tr> <td>Name</td> <td><input type="text" name="name" value="<?php echo $book['name']; ?>" /> </td>  </tr>
            <tr> <td>Author</td> <td><input type="text" name="author" value="<?php echo $book['author']; ?>" /> </td> </tr>
            <tr> <td>&nbsp;</td> <td><button value="save" name="btnAction" type="submit"><span>Update</span></button>
                    <div class="or_cancel">or  <a href="<?php echo BASE_URL; ?>index.php?book/books"> Cancel</a></div> </td> </tr>
        </table>

    </form>
</div>