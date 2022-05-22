<?php 
   date_default_timezone_set('Asia/Ho_Chi_Minh');
  
   $productSale=mysqli_query($connect,
  'select sum(quantity) 
   from order_detail JOIN orders on  order_detail.order_id=orders.id 
   where orders.status=1 ');
   $productSale=mysqli_fetch_array($productSale)['sum(quantity)'];

   $TotalOrder=mysqli_query($connect,'select count(*) from orders');
   $TotalOrder=mysqli_fetch_array($TotalOrder)['count(*)'];

   $TotalAdmin=mysqli_query($connect,'select count(*) from admin');
   $TotalAdmin=mysqli_fetch_array($TotalAdmin)['count(*)'];

  $Sales=mysqli_query($connect,'select sum(total_price) from orders');
  $Sales=mysqli_fetch_array($Sales)['sum(total_price)'];

  $start=1;
  $end=12;  
    
  if (isset($_GET['year'])){
    $year=$_GET['year'];
  }
  else{
    $year=date('Y');
  }
  
   while ($start <= $end){
      $result= date($year.'-'.$start.'-'. 1 );
      $items=mysqli_query($connect,"select ifnull(sum(total_price),0)  as total from orders where month(time)= month('$result') and year(time)=year('$result') ");
      $MonthlySale[]= (float)mysqli_fetch_array($items)['total'];
      $start++;    
   }

$MonthlySale= json_encode($MonthlySale);

$bestSales=mysqli_query($connect,"select product.id,product.Name,ifnull(sum(order_detail.quantity),0) as quantitySale 
from product 
LEFT JOIN order_detail on order_detail.product_id=product.id
LEFT JOIN orders on orders.id = order_detail.order_id 
where  (orders.status=1 or  orders.status is null) and year(time)= '$year'
Group By product.id
ORDER BY quantitySale DESC
limit 5");
$arrItem=[];
$total=0;
foreach($bestSales as $item){
    $arrItem[]=[
        'name'=> $item['Name'],
        'y'   => (float)($item['quantitySale']/$productSale)*100,
    ];
    
    $total+=(float)$item['quantitySale'];
}


$arrItem[]=[
    'name'=>'other',
    'y'  => (float)($productSale-$total),
];
$arrItem= json_encode($arrItem);


?>

<div class="container">

    <div class="row">
        <div class="col-lg-3 ">
            <div class="card home-card">
                <div class="card-body ">
                    <p class="card-tittle home-header-size text-center" >Product Sale <i class="ti-package"></i></p>
                    <p class="card-text text-center"><?php echo $productSale ?></p>

                </div>
            </div>
        </div>

        <div class="col-lg-3 ">
            <div class="card home-card">
                <div class="card-body ">
                    <p class="card-tittle home-header-size text-center" >Total Order <i class="ti-clipboard"></i></p>
                    <p class="card-text text-center"><?php echo $TotalOrder ?></p>

                </div>
            </div>
        </div>

        <div class="col-lg-3 ">
            <div class="card home-card">
                <div class="card-body ">
                    <p class="card-tittle home-header-size text-center" >Employee <i class="ti-user"></i></p>
                    <p class="card-text text-center"><?php echo $TotalAdmin ?></p>

                </div>
            </div>
        </div>

        <div class="col-lg-3 ">
            <div class="card home-card">
                <div class="card-body ">
                    <p class="card-tittle home-header-size text-center" > Total Sales <i class="ti-money"></i></p>
                    <p class="card-text text-center"><?php echo $Sales?> $</p>

                </div>
            </div>
        </div>
         
    </div>

    <div class="row mt-5">

        <div class="col-7">
            <form action="" method="GET">
                <select name="year" id="" class="form-select" onchange="this.form.submit()">
                     <?php for($i=2020;$i<=date("Y");$i++): ?>
                        <option value="<?php echo $i ?>" <?php if($year==$i){echo 'selected';  } ?>><?php echo $i ?></option>
                      <?php endfor  ?>
                     
                </select>
    
            </form>
            <figure class="highcharts-figure">
              <div id="container"></div>
              
            </figure>
        </div>

        <div class="col-5">
           <figure class="highcharts-figure">
             <div id="container-2"></div>
            
           </figure>
        </div>
        
    </div>

    <div class="row mt-5">
        <div class="col-8">
          <div class="input-group">
            <input type="date" name="date_1" class="form-select w-25" value="<?php echo date('2022-01-01') ?>" max="<?php echo date('Y-m-d') ?>"  >
            <input type="date" name="date_2" class="form-select w-25" value="<?php echo date('Y-m-d') ?>" max="<?php echo date('Y-m-d') ?>" >
            <button id="product_sale"  class="btn btn-secondary ms-2 "> Filter </button>  
          </div>
         
          
         
            <div  id="product_statistics" class="container mt-5">
  

           </div>
     </div>




    </div>
    
</div>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script type="text/javascript">
    //sales
  Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Sales Statistics'
    },
    subtitle: {
        text: 'Monthly'
    },
    xAxis: {
        categories: [
            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'May',
            'Jun',
            'Jul',
            'Aug',
            'Sep',
            'Oct',
            'Nov',
            'Dec'
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: ' VND  '
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} $</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'TotalSales',
        data: <?php echo $MonthlySale ?>
       }
    ]
});

//product
Highcharts.chart('container-2', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Product Sale'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %'
            }
        }
    },
    series: [{
        name: 'Brands',
        colorByPoint: true,
        data: <?php echo $arrItem ?>
    }]
});
  
//product statiscal
   $("#product_sale").click(function(){        
          var date_1= $('input[name=date_1]').val() ;
          var date_2=$('input[name=date_2]').val()     
        $("#product_statistics").load('statistical/process.php?action=product_statistics',{time1:date_1,time2:date_2})
    })
    $("#product_statistics").load('statistical/process.php?action=product_statistics',{time1:'2022-01-01',time2:'<?php echo date('Y-m-d') ?>'})
</script>
