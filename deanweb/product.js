var usernameative ="hoang";
var numbill= 0;
var accountactive = 0;
//
var user=[
    {  username:"hoang",password:"1234567" }

]
localStorage.setItem('user',JSON.stringify(user))
function crnewuser(){
    var newuser,a,b,c;
    a = document.getElementById('user-name').value;
    b = document.getElementById('user-account1').value;
    c = document.getElementById('user-password1').value;
    d = document.getElementById('user-password-check').value;
    if(a === "")
        alert("hãy nhập tên");
    else if(b === "")
        alert("hãy nhập tên đăng nhập");
    else if(c === "")
        alert("hãy nhập mật khẩu");
    else if(d !== c)
        alert("mật khẩu không trùng khớp");
    else if(checkuser(b) === 1)
        alert("tk đã tồn tại");
    else if(c.length < 6)
        alert("mật khẩu ít nhất 6 chữ số");
    else{
	arruser = JSON.parse(localStorage.getItem('user'));
	newuser = {fullname: a, username: b, password: c};
	arruser.push(newuser);
	localStorage.setItem('user',JSON.stringify(arruser));
        alert("đăng kí thành công");
    }
    //showuser((arruser.length-1)/6+1);
}

function checkuser(a){
    var arruser = JSON.parse(localStorage.getItem('user'));
    for(var i = 0;i < arruser.length ;i++){
        if(a === arruser[i].username)
            return 1;
    }
    return 0;
}

function login(){
    var a,b,i;
    a=document.getElementById('user-account').value;
    b=document.getElementById('user-password').value;
    arruser = JSON.parse(localStorage.getItem('user'));
    if(a === "" )
        alert("hãy nhập tên đang nhập");
    else if(b === "") 
        alert("hãy nhập mk");
    else if(a ==='admin' && b==='admin'){
        
        checkactive(1);
        activemodalbox();
    }
    
    else
    for( i = 0; i < arruser.length ;i++ ){
        if( arruser[i].username === a  && arruser[i].password === b){
            alert("Loged in");
           
            accountactive = 1;
            activemodalbox();
            
            usernameative = arruser[i].username;
            document.getElementById('header2').innerHTML = '<div id="logout" class="History" onclick="showhisbill(\''+arruser[i].username+'\');openhis();">Lịch sử</div>';
            document.getElementById('header1').innerHTML = ' <div id="logout"onclick="checkactive(0); checkactive(0);">đăng xuất</div>';
            break;
        }
    }
    if(i === arruser.length )
        alert("sai tk hoac mk vui long kiem tra lai");
}

function checkactive(a){
    if(a === 0 && accountactive === 1){
        var tmp = document.getElementById('logout');
        tmp.parentNode.removeChild(tmp);
        accountactive = 0;
    }
    else if(a === 1 &&  accountactive === 0) {
        document.getElementById('header1').innerHTML += '<a  href="admin.html" id="gotoadmin" style="text-decoration: none;">admin</a><a id="logout" onclick="checkactive(2);">đăng xuất</a>';
        accountactive = 1;
    }
    else{
        document.getElementById('header1').removeChild(document.getElementById('logout') );
        document.getElementById('header1').removeChild(document.getElementById('gotoadmin'));
        accountactive = 0;
    }
}

function showhisbill(a){
    var arrbill = JSON.parse(localStorage.getItem('test1'));
    var s="";
    var tmp1,tmp2;
    
    var count = 1;
    for(var i = 0 ;i < arrbill.length;i++){
        if(arrbill[i].namebill === a){
        if(arrbill[i].flagcheck === 1){
            tmp2 = 'chưa xử lí';
            tmp1 = 'đã xử lí';
        }
        else{
            tmp1 = 'chưa xử lí';
            tmp2 = 'đã xử lí';
        }
        s+='<tr> <th>'+count+'</th><th>'+arrbill[i].total+'</th> <th>'+arrbill[i].addr+'</th><th>'+arrbill[i].phone+'</th><th>'+arrbill[i].datebill+'</th><th>'+tmp1+'</th> </tr>';
        count++;
        }
    
    }
    document.getElementById('showcontentbillhome').innerHTML = '<thead><tr> <th>SST</th> <th>Tổng</th> <th>Dia Chi</th> <th>SDT</th> <th>Ngày</th> <th>   </th></tr> </thead><tbody id="myCart">'+ s +'</tbody> </table> '; 
}

  
var prod=[
    {img:'3x4/1.png'   ,productType:'Bánh Mì' ,nameprod:'Bánh Mì',priceprod:20000},
    {img:'3x4/2.png'   ,productType:'Bánh Kem' ,nameprod:'Bánh Kem Socola',priceprod:70000 },
    {img:'3x4/3.png'   ,productType:'Bánh Mì' ,nameprod:'HotDog',priceprod:40000 },
    {img:'3x4/4.png'   ,productType:'Banh Mi' ,nameprod:'Hamburgur',priceprod:30000 },
    {img:'3x4/5.png'   ,productType:'Banh Kem' ,nameprod:'Bánh Kem Nhỏ',priceprod:20000 },
    {img:'3x4/6.png'   ,productType:'Banh Bong Lan' ,nameprod:'Bánh Bông Lan',priceprod:10000 },
    {img:'3x4/7.png'   ,productType:'Banh Ngot' ,nameprod:'Bánh Crornut',priceprod:30000 },
    {img:'3x4/8.png'   ,productType:8 ,nameprod:'Banh Kem1',priceprod:30000 },
    {img:'3x4/9.png'   ,productType:9 ,nameprod:'Banh Donut',priceprod:50000 },
    {img:'3x4/10.png'  ,productType:10 ,nameprod:'Banh Bong Lan socola',priceprod:10000 },
    {img:'3x4/11.png'  ,productType:11 ,nameprod:'Banh Quy',priceprod:30000 },
    {img:'3x4/12.png'  ,productType:12 ,nameprod:'Banh Mi Khong',priceprod:40000 },
    {img:'3x4/14.png'  ,productType:13 ,nameprod:'Banh Donut1',priceprod:70000 },
    {img:'3x4/15.png'  ,productType:14 ,nameprod:'Banh Cronut 1',priceprod:20000 },
    {img:'3x4/16.png'  ,productType:15 ,nameprod:'Banh Kem 1',priceprod:10000 },
    {img:'3x4/17.png' ,productType:16 ,nameprod:'Banh Xop',priceprod:15000 },
    {img:'3x4/1.png'   ,productType:17 ,nameprod:'Banh Mi',priceprod:10000 },
    {img:'3x4/1.png'   ,productType:18 ,nameprod:'Banh Mi',priceprod:90000 },
    {img:'3x4/1.png'   ,productType:19 ,nameprod:'Banh Mi',priceprod:30000 },
    {img:'3x4/1.png'   ,productType:20 ,nameprod:'Banh Mi',priceprod:10000 }
    
    
    ];
    localStorage.setItem('prod',JSON.stringify(prod));
 var arrprod = JSON.parse(localStorage.getItem('prod'));




  
  
  function showprodhome(a){
  a = parseInt(a);
  var arrprod = JSON.parse(localStorage.getItem('prod'));
   
  var tr="";
    var tmp = (arrprod.length-1)/8 + 1;
    var s="";
    for(var j = 1 ;j <= parseInt(tmp);j++){
        s += '<li onclick="showprodhome('+ j +');">'+ j +'</li>';
    }
    
    for(var i = (a-1)*8 ; i < a*8 && i < arrprod.length;i++){
  tr+='<div class="productbox"> <div class="img-container" > <img src="'+ arrprod[i].img +'"/> </div> <dl> <dt class="ProductID"> Loại Bánh: '+ arrprod[i].productType +'</dt> <dt class="ProductName" >'+ arrprod[i].nameprod +' </dt> <dt class="ProductPrice" >Giá : '+ arrprod[i].priceprod +'</dt> <dt><input type="number" id="'+arrprod[i].nameprod+'" value="0"/><button onclick="addtoCart(\''+arrprod[i].nameprod+'\',\''+arrprod[i].priceprod+'\')">đặt hàng</button></dt> </dl> </div>';
           
        }
  document.getElementById('Product').innerHTML= tr +' <ul>'+s+'</ul>';
  
  }
 
   

  
     
      
  
    
    showprodhome(1);
  
var test1=[
    {      }
] 
localStorage.setItem('test1',JSON.stringify(test1))


var detailbilltest=[
    {    }
]  
localStorage.setItem('detailbilltest',JSON.stringify(detailbilltest))


    function showdetailbill(){
      
        var arrbill = JSON.parse(localStorage.getItem('test1'));
        numbill = arrbill.length;
        var arrdetailbill = JSON.parse(localStorage.getItem('detailbilltest'));
        var tr = "";
        for(var i =0;i<arrdetailbill.length; i++){
            if(arrdetailbill[i].idbill === numbill)
              tr+='<tr> <th>'+arrdetailbill[i].nameprod+'</th><th>'+arrdetailbill[i].priceprod+'</th><th>'+arrdetailbill[i].quantityprod+'</th><th>'+arrdetailbill[i].total+'</th> <th><button onclick="deletebill(\''+arrdetailbill[i].nameprod+'\')">xóa</button></th></tr>';
        }
        
        document.getElementById("myCart").innerHTML = tr ;
    }
      
      function addtoCart(a,b){
       if(accountactive === 0)
           alert("Ban can dang nhap");
       else{
           
        var arrbill = JSON.parse(localStorage.getItem('test1'));
        numbill = arrbill.length;
        var newdetailbill,a,b,c,d,e;
        c = document.getElementById(a).value;
        if(c<=0) 
            alert("so luong khong hop le ");
        alert(c);
            var arrdetailbill = JSON.parse(localStorage.getItem('detailbilltest'));
            b = parseFloat(b);
            c = parseFloat(c);
            newdetailbill ={idbill: numbill,nameprod: a, priceprod: b, quantityprod: c, total: b*c};
            
            if(c>0){
      
        arrdetailbill.push(newdetailbill);
            localStorage.setItem('detailbilltest',JSON.stringify(arrdetailbill));
            alert("đặt thành công");
        
        showdetailbill();
        document.getElementById('totalallprod').innerHTML = 'Tổng tien:     '+totalbill(numbill);
       }
       
       }
      }
      
      function deletebill(s){
        arrbill = JSON.parse(localStorage.getItem('detailbilltest'));
        for(var i=0;i < arrbill.length;i++){
                if(arrbill[i].nameprod === s){
                    if(confirm("bạn có chắc xóa này ")){
                        arrbill.splice(i, 1);
                        break;
                    }
                }
            }
        localStorage.setItem('detailbilltest',JSON.stringify(arrbill));
            showdetailbill();
            document.getElementById('totalallprod').innerHTML = 'Tổng tien :     '+totalbill(numbill);
      
    }
    
    function totalbill(a){
        var arrdetailbill = JSON.parse(localStorage.getItem('detailbilltest'));
        var sum=0;
        for(var i = 0 ;i <arrdetailbill.length; i++){
            if( arrdetailbill[i].idbill === a)
                sum += arrdetailbill[i].total;
        }
        
        return sum;
        
    }
    
    function datebill(){
        var today = new Date();
        var date = parseInt(today.getDate())+'/'+parseInt(today.getMonth()+1)+'/'+parseInt(today.getFullYear());
        return date ;
    }
    
    function createbill(){
        if(accountactive === 0)
           alert("bạn cần đăng nhập");
        else{
            
        var arrbill = JSON.parse(localStorage.getItem('test1'));
        numbill = arrbill.length;
        var a,b;
        a = document.getElementById("address").value;
        b = document.getElementById("phone").value;
        if(a === "")
            alert("nhập dịa chỉ");
        else if(b === "")
            alert("nhập sdt");
        else if(b.length < 10 || b.length > 10 || b.charAt(0) !== '0')
            alert("sđt ko hợp lệ");
        else{
            newbill = {idbill: numbill,namebill: usernameative, total: totalbill(numbill),addr: a,phone: b, datebill: datebill(), flagcheck: 0};
            arrbill.push(newbill);
            localStorage.setItem('test1',JSON.stringify(arrbill));
            alert("thanh toán thành công xin hãy cho shop xử lí đơn hàng");
            
            showdetailbill();
        }
        }
    }
     function openhis(){
            document.getElementById("history").style.display = "flex";
            }
     function closehis(){
            document.getElementById("history").style.display = "none";
            }
            
            var flagcheckmodal = 0;
    function activemodalbox(){
        if(flagcheckmodal === 0){
            document.getElementById('boxmodal').setAttribute("style","display: flex;");
            flagcheckmodal = 1;
        }
        else{
            document.getElementById('boxmodal').setAttribute("style","display: none;");
            flagcheckmodal = 0;
        }
    }
    
    
    


