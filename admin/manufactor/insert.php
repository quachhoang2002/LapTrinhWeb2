<?php 
   
  $output=' 
    <form action="manufactor/process.php?action=insert" method="POST" >   
      TEN <input type="text" name="name" id="name">
      PHONE <input type="text" name="phone">
      COUNTRY <input type="text" name="country">
      <button> addproduct</button>
    </form>';
  echo $output;
 ?>
