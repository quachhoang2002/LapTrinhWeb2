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
	var tr='<tr><th>STT</th><th>Tên đầy đủ</th><th>TÊN ĐĂNG NHẬP</th><th>Mật Khẩu</th><th>XOA</th></tr>';
	for(var i=0; i< arruser.length;i++){
		tr+='<tr><td>'+(i+1)+'</td><td>'+arruser[i].fullname+'</td><td>'+arruser[i].username+'</td><td>'+ arruser[i].password +'</td><td><button class="delete" onClick="deleteuser(\''+arruser[i].username+'\')">&times;</button></td></tr>';
	
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
	showUserList();
}