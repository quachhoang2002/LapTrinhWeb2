function cong(){
    alert("bạn đang làm phép cộng");
    var a = document.tinhtoan.txtsoa.value;
    var b = document.tinhtoan.txtsob.value;
    var kq = parseFloat(a) + parseFloat(b);
    var tmp = document.getElementById('kq').value;
    document.getElementById('kq').value = 3;
}

function tru(){
    alert("bạn đang làm phép trừ");
    var a = document.tinhtoan.txtsoa.value;
    var b = document.tinhtoan.txtsob.value;
    var kq = parseFloat(a) - parseFloat(b);
    document.tinhtoan.txtkq.value = kq;
}

function nhan(){
    alert("bạn đang làm phép nhân");
    var a = document.tinhtoan.txtsoa.value;
    var b = document.tinhtoan.txtsob.value;
    var kq = parseFloat(a) * parseFloat(b);
    document.tinhtoan.txtkq.value = kq;
}

function chia(){
    alert("bạn đang làm phép chia");
    var a = document.tinhtoan.txtsoa.value;
    var b = document.tinhtoan.txtsob.value;
    var kq = parseFloat(a) / parseFloat(b);
    document.tinhtoan.txtkq.value = kq;
}

function conggt(soa, sob){
    alert("bạn đang làm phép cộng truyền giá trị");    
    var kq = parseFloat(soa) + parseFloat(sob);
    document.tinhtoan.txtkq.value = kq;
}

function trugt(soa, sob){
    alert("bạn đang làm phép trừ truyền giá trị");
    var kq = parseFloat(soa) - parseFloat(sob);
    document.tinhtoan.txtkq.value = kq;
}

function nhangt(soa, sob){
    alert("bạn đang làm phép nhân truyền giá trị");
    var kq = parseFloat(soa) * parseFloat(sob);
    document.tinhtoan.txtkq.value = kq;
}

function chiagt(soa, sob){
    alert("bạn đang làm phép chia truyền giá trị");
    var kq = parseFloat(soa) / parseFloat(sob);
    document.tinhtoan.txtkq.value = kq;
}

function chonpheptinh(obj){
    var a = document.getElementById('soa').value;
    var b = document.getElementById('sob').value;
    if(obj.value === '+')
        document.tinhtoan.txtkq.value = parseFloat(a) + parseFloat(b);
    else if(obj.value === '-')
        document.tinhtoan.txtkq.value = parseFloat(a) - parseFloat(b);
    else if(obj.value === '*')
        document.tinhtoan.txtkq.value = parseFloat(a) * parseFloat(b);
    else if (obj.value === '/')
        document.tinhtoan.txtkq.value = parseFloat(a) / parseFloat(b);
    else
        alert("hãy chọn phép tính");
}

function showbilladmin(){
    totalbill();
    var arrbill = JSON.parse(localStorage.getItem('bill'));
    var s="";
    var tmp1,tmp2;
    
    for(var i = 0;i < arrbill.length;i++){
        if(arrbill[i].flagcheck === 1){
            tmp2 = 'chưa xử lí';
            tmp1 = 'đã xử lí';
        }
        else{
            tmp1 = 'chưa xử lí';
            tmp2 = 'đã xử lí';
        }
        s+='<tr> <td>'+arrbill[i].idprodbill+'</td><td>'+arrbill[i].nameprodbill+'</td> <td>'+arrbill[i].priceprodbill+'</td><td>'+arrbill[i].quantitybill+'</td><td>'+arrbill[i].total+' <select onchange="checkbill(this)'+arrbill[i].idprodbill+');"/><option value="0">'+tmp1+'</option> <option value="1">'+tmp2+'</option></td> </tr>';
        
    }
    document.getElementById('contentadmin').innerHTML = '<table id="contentadminbox1"> <tr> <th>Mã</th> <th>Tên</th> <th>Giá</th> <th>SL</th> <th>total</th></tr> '+ s +' </table>';
}

function datebill(){
    var today = new Date();
    var date = parseInt(today.getDate())+'/'+parseInt(today.getMonth()+1)+'/'+parseInt(today.getFullYear());
    return date ;
}

function showbill(){
    var arrdetailbill = JSON.parse(localStorage.getItem('test1'));
    var tr = "";
    for(var i =0;i<arrdetailbill.length; i++){
        tr+='<ul> <li>'+arrdetailbill[i].idbill+'</li> <li>'+arrdetailbill[i].namebill+'</li><li>'+arrdetailbill[i].total+'</li> <li>'+arrdetailbill[i].addr+'</li><li>'+arrdetailbill[i].phone+'</li><li>'+arrdetailbill[i].datebill+'</li><li>'+arrdetailbill[i].flagcheck+'</li> </ul>';
       
    }
    document.getElementById("test1").innerHTML = tr ;
}

function showdetailbill(){
    var arrdetailbill = JSON.parse(localStorage.getItem('detailbilltest'));
    var tr = "";
    for(var i =0;i<arrdetailbill.length; i++){
        tr+='<ul> <li>'+arrdetailbill[i].idbill+'</li> <li>'+arrdetailbill[i].nameprod+'</li><li>'+arrdetailbill[i].priceprod+'</li><li>'+arrdetailbill[i].quantityprod+'</li><li>'+arrdetailbill[i].total+'</li> </ul>';
    }
    
    document.getElementById("test1").innerHTML = tr ;
}

function totalbill(a){
    var arrdetailbill = JSON.parse(localStorage.getItem('detailbilltest'));
    var sum=0;
    for(var i = 0 ;i <arrdetailbill.length; i++){
        if( arrdetailbill[i].idbill === a)
            sum += arrdetailbill[i].total;
    }
    //var arrbill = JSON.parse(localStorage.getItem('test1'));
    return sum;
    //localStorage.setItem('test1',JSON.stringify(arrbill));
}
var usernameative ="hiu";
var numbill= 0;
function createbill(){
    var arrbill = JSON.parse(localStorage.getItem('test1'));
    numbill = arrbill.length;
    var a,b;
    a = document.getElementById("address").value;
    b = document.getElementById("phone").value;
    if(a === "")
        alert("nhập ddịa chỉ");
    else if(b === "")
        alert("nhập ssdt");
    else{
        newbill = {idbill: numbill,namebill: usernameative, total: totalbill(numbill),addr: a,phone: b, datebill: datebill(), flagcheck: 0};
        arrbill.push(newbill);
        localStorage.setItem('test1',JSON.stringify(arrbill));
        numbill ++;
    }
    showbill();
}

function createbill_prod(){
    var arrbill = JSON.parse(localStorage.getItem('test1'));
    numbill = arrbill.length;
    var newbill,newdetailbill,a,b,c,d,e;
    a = document.getElementById('nameprodbill').value;
    b = document.getElementById('priceprodbill').value;
    c = document.getElementById('quantityprodbill').value;
    if(a === "")
        alert("hãy nhập tên");
    else if(b === "")
        alert("hãy nhập giá");
    else if(c === "")
        alert("hãy nhập số lượng");
    else{
        var arrdetailbill = JSON.parse(localStorage.getItem('detailbilltest'));
        b = parseFloat(b);
        c = parseFloat(c);
        newdetailbill ={idbill: numbill,nameprod: a, priceprod: b, quantityprod: c, total: b*c};
	arrdetailbill.push(newdetailbill);
        localStorage.setItem('detailbilltest',JSON.stringify(arrdetailbill));
        alert("đặt thành công");
    }
    showdetailbill();
}

function deletebill(){
    var arrbill = JSON.parse(localStorage.getItem('detailbilltest'));
	for(var i=2;i < arrbill.length;i++){
                    arrbill.splice(i, 1);
            }
        
	localStorage.setItem('detailbilltest',JSON.stringify(arrbill));
}

function deleteallprod(){
    var arrprod = JSON.parse(localStorage.getItem('test1'));
        var i;
	for( i=5;i < arrprod.length;i++){
            
                    arrprod.splice(i, 1);
             
        }
	localStorage.setItem('test1',JSON.stringify(arrprod));
}


