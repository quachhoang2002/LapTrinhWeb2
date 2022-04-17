function hienthi(obj){
    console.log(obj.id);
    switch(obj.id){
        case 'tc':
            document.getElementById("content").innerHTML = '<div id="trangchu" ><div id="imgtc"> </div> </div>';
            break;
        case 'ttts':
            document.getElementById("content").innerHTML='<div>Ban chọn thông tin tuyển sinh</div>';
            break;
        case 'gm':
            document.getElementById("content").innerHTML='<div> guiwr mail </div>';
            break;
	case 'gosec2':
            document.getElementById("content").innerHTML='section 2';
            break;
    }
}

function show(a){
    switch (a){
        case 0:
            document.getElementById("content").innerHTML = '<div> <img src="image/3.jpg" style="height: 400px; width: 400px"/>  </div>';
            break;
        case 1:
            document.getElementById("content").innerHTML='<div><img src="image/2.jpg" style="height: 400px; width: 400px;"/></div>';
            break;
        case 2:
            document.getElementById("content").innerHTML='<div> còn 10 </div>';
            break;
	case 3:
            document.getElementById("content").innerHTML='<div> hết hàng </div>';
            break;
        case 4:
            document.getElementById("content").innerHTML='<div> hết hàng </div>';
    }
}

function crmenu(){
    var sanpham=["Máy tính Asus","Máy tính HP","Máy tính Lenovo","Máy tính Dell","Masy tính Acer"];
    var s="";
    for(i=0;i<sanpham.length;i++)
    {	var a='<a href="#"><li onclick="show('+i+');">'+ sanpham[i] + '</li></a>';		
	s+=a;
    }
    
    s='<ul>'+s+'</ul>';
    //alert(s);
    document.getElementById("leftmenu").innerHTML=s;
}

function type(IDtype,nametype){
    this.IDtype = IDtype;
    this.nametype = nametype;
}

function crmenubytype(){
    var arrtype = [new type("as","ASUS"),
        new type("hp", "HP"),
        new type("le", "LENOVO"),
        new type("de", "DEL"),
        new type("hp", "HP"),
        new type("le", "LENOVO")];
    var s = "";
    for(var i = 0;i < arrtype.length;i++){
        var a = '<a href="#?' + arrtype[i].IDtype + '"><li onclik="hienthi1(this);">'+ arrtype[i].nametype + '</li></a>';
        s += a;
    }
    document.getElementById("leftmenunext").innerHTML = s;
}

function closeleftmenutype(){
    document.getElementById("leftmenunext").style.display= "none";
}

function showaccount(){
    document.getElementById("content").innerHTML = '<script> cradmin(); </script><div id="userlist"></div> <button id="showuser" onclick="createnewuser();">đăng kí</button> <input type="text" value="" name="txtname" id="name" placeholder="nhập họ tên" /> <input type="text" value="" name="txtuser" id="user" placeholder="nhập tên tk" /> <input type="text" value="" name="txtpass" id="pass" placeholder="nhập mật khẩu " />';
}

function cradmin(){
    var arruser = [];
    var accadmin = {username: 'admin', password: 'admin', fullname: 'Admin', usertype: 'admin'};
    arruser.push(accadmin);
    console.log(arruser);
    localStorage.setItem('user',JSON.stringify(arruser));
}

function showUserList(){
	if(localStorage.getItem('user')===null){
		return false;
	}
	arruser = JSON.parse(localStorage.getItem('user'));
	var tr='<h2> STT    Tên đầy đủ  TÊN ĐĂNG NHẬP   Mật Khẩu    XOA</h2>';
	for(var i=0; i< arruser.length;i++){
		tr+='<p> '+(i+1)+'  '+arruser[i].fullname+'     '+arruser[i].username+'     '+ arruser[i].password +'   <button class="delete" onClick="deleteuser(\''+arruser[i].username+'\')">&times;</button> </p>';
	
	}
	document.getElementById('userlist').innerHTML=tr;
}

function deleteuser(usernamedelete){
	var arruser = JSON.parse(localStorage.getItem('user'));
	for(var i=0;i < arruser.length;i++){
		if(arruser[i].username === usernamedelete){
			if(confirm('Bạn có muốn xóa tài khoản này?')){
				arruser.splice(i, 1);
			}
		}
	}
	localStorage.setItem('user',JSON.stringify(arruser));
	showUserList();
}

var user1;
function createnewuser()
{
    if(document.getElementById('name').value === "")
        alert("hãy nhập tên");
    else if(document.getElementById('user').value === "")
        alert("hãy nhập tên đăng nhập");
    else if(document.getElementById('pass').value === "")
        alert("hãy nhập mật khẩu");
    else{
	arruser = JSON.parse(localStorage.getItem('user'));
	user1 = {fullname: document.getElementById('name').value, username: document.getElementById("user").value, password: document.getElementById("pass").value, usertype:"khachhang"};
	console.log(user1.username);
	console.log("Type user 1:");
	arruser.push(user1);
	localStorage.setItem('user',JSON.stringify(arruser));
    }
    var a = arruser.length;
    alert(a);
	showUserList();
}


