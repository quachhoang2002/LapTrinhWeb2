 
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style.css">
  <script src="../../jquery-3.6.0.min.js"></script>
</head> 
<body>  
<input type="date" name="date_1" value="<?php echo date('2022-01-01') ?>" min="<?php echo date('2022-01-01')?>"    >
   <input type="date" name="date_2" value="<?php echo date('Y-m-d') ?>" max="<?php echo date('Y-m-d') ?>" >
  <button id="product_sale"> Thong Ke San Pham </button>




  <button id="sales">  Thong Ke Doanh Thu</button>
  <div  id="product_statistics">
  

 </div>



</body>


<script type="text/javascript">
 

 
    $("#product_sale").click(function(){
          var date_1= $('input[name=date_1]').val() ;
          var date_2=$('input[name=date_2]').val() 
          
          //set max value for input date
          $("input[name=date_1]").attr('max',date_2)
          $("input[name=date_2]").attr('min',date_1)
        $("#product_statistics").load('process.php?action=product_statistics',{time1:date_1,time2:date_2})
    })
  
  
  

</script>

</html>