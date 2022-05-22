       <?php    
           if(!isset($_SESSION['level'])){
            header('location:../admin-login/adminLogin-form.php');                 
           }  
        ?>

      <?php
          $sql="select* from manufacture";
          $result=mysqli_query($connect,$sql);
       ?>

    

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
            <td> <button class="btn btn-info" onclick="Update(<?php echo $value['Ma']?>)" data-bs-toggle="modal" data-bs-target="#exampleModal" > Sua</button></td>
            <td><input type="button" class="btn btn-danger" value="xoa"onclick="Delete(<?php echo $value['Ma']?>)"></td>   
          </tr> 
         <?php endforeach  ?>
      </tbody>
    </table>
    <button onclick="Add(<?php echo $value['Ma']?>)" data-bs-toggle="modal" class="btn btn-success float-end" data-bs-target="#exampleModal">Them NSX</button>
  </div>
   

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" id="load-form" >
      
        <div id="load-form" class="modal-body">
          
       </div>
    </div>
  </div>
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
