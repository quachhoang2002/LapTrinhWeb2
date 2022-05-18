 
 <?php date_default_timezone_set('Asia/Ho_Chi_Minh'); ?>
<input type="date" name="date_1" value="<?php echo date('2022-01-01') ?>" max="<?php echo date('Y-m-d') ?>"   >
   <input type="date" name="date_2" value="<?php echo date('Y-m-d') ?>" max="<?php echo date('Y-m-d') ?>" >
  <button id="product_sale"> Thong Ke San Pham </button>

  <div  id="product_statistics" class="container">
  

 </div>


<script type="text/javascript">
  
    $("#product_sale").click(function(){        
          var date_1= $('input[name=date_1]').val() ;
          var date_2=$('input[name=date_2]').val()     
        $("#product_statistics").load('statistical/process.php?action=product_statistics',{time1:date_1,time2:date_2})
    })
    $("#product_statistics").load('statistical/process.php?action=product_statistics',{time1:'2022-01-01',time2:'<?php echo date('Y-m-d') ?>'})

</script>

