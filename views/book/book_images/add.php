<div>
    <form enctype="multipart/form-data" method="post" action="">
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr> <td>Image</td> <td>  
                    
                    <input type="file" name="fileToUpload" id="fileToUpload" /></td>  </tr>
            <tr> <td>Caption</td> <td><input type="text" name="caption" value="" /> </td>  </tr>
            <tr> <td>&nbsp;</td> <td><button value="save" name="btnAction" type="submit"><span>Save</span></button>
                     <div class="or_cancel">or  <a href="<?php echo BASE_URL; ?>index.php?book/book_images"> Cancel</a></div> </td> </tr>
        </table>

    </form>
</div>