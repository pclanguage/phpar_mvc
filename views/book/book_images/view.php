<div>
   
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr> <td>Image </td> <td>  
                    <?php 
                     $image_path=   'uploads/books/' . $_SESSION['book_id'].'/'.$book_image['id'].'/thumb_'.$book_image['imagename'];
                    ?>
                     <img   src="<?php echo BASE_URL.$image_path; ?>" />
                   </td>  </tr>
            <tr> <td>Caption</td> <td> <?php echo $book_image['caption']; ?>"   </td>  </tr>
             
        </table>
 
</div>