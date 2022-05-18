       <?php    
           if(!isset($_SESSION['level'])){
            header('location:../admin-login/adminLogin-form.php');                 
           }  
        ?>

      <?php
          $sql="select* from manufacture";
          $result=mysqli_query($connect,$sql);
       ?>

       <?php  if(isset($_SESSION['adminID'])):  ?>
         <span > 
             <?php echo $_SESSION['adminName']; ?>
             <a href="../login/logout.php"> Dang Xuat</a>
          </span>   
       <?php endif ?> 

 <div class="container mt-5 mb-5">
    <table  class="table table-bordered border-dark text-center align-middle" >  
      <thead class="gradient-custom-4">
         <tr>
             <td>Ma</td>
             <td>Ten</td>
             <td>SDT</td>
             <td>Country</td>
             <td>sua </td>
             <td>xoa</td>
         </tr>
      </thead>
      <tbody>
         <?php foreach ($result as $value) :?>
          <tr>
            <td><?php echo $value['Ma'] ?></td>
            <td><?php echo $value['name'] ?></td>
            <td><?php echo $value['phone'] ?></td>
            <td> <?php echo $value['Country']  ?></td>
            <td> <button onclick="Update(<?php echo $value['Ma']?>)" > Sua</button></td>
            <td><input type="button" value="xoa"onclick="Delete(<?php echo $value['Ma']?>)"></td>   
          </tr> 
         <?php endforeach  ?>
      </tbody>
    </table>
  </div>
    <button onclick="Add(<?php echo $value['Ma']?>)">Them NSX</button>

    <div id="load-form">

   </div>
 

<script type="text/javascript"> 
      
      function Update(id){
             $('#load-form').load('manufactor/update-form.php',{id:id})
        }

        function Delete(id){
                  $.ajax({
                    url:'manufactor/process.php?action=delete',
                    method:'POST',
                    data:{id:id },
                    success:function(data){
                      alert(data)
                      window.location.reload()
                    },
                  })
                }
      function Add(){
        $('#load-form').load('manufactor/insert.php')
      }
                  
</script>
