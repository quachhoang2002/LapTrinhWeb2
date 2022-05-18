 <?php 
    require '../../connect.php';
    $ma=$_POST['id'];
    $sql="select* from manufacture where Ma=$ma";
    $result=mysqli_query($connect,$sql);
    $item=mysqli_fetch_array($result);

   $output='
    <form method="POST" action="manufactor/process.php?action=update" enctype="multipart/form-data">    
             <input type="hidden" value='.$item['Ma'].' name=id >        
             <div> Ten <input value='. $item['name'].' type=text name=name> </div>        
             <div> SDT    <input value='. $item['phone'].' name=phone> </div>      
             <div> Country <input value='. $item['Country'].' type=text name=country> </div>   
            <button> Sua </button>
    </form>
   ' ;

   echo $output;
?>
    

  


 
 
