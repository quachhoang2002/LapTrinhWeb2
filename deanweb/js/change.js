function exit(){
    document.getElementById("wrapper").style.display = "none";
}
var a=0,b=0;
function value1(){
    if(a % 2 === 0)
    {    
        document.getElementById("wrapper").setAttribute("style"," width: 1000px; height:600px; background-color: red;"  );
    }
    else{
        document.getElementById("wrapper").setAttribute("style", "height: 350px; width: 510px; background-color: bisque; position: absolute; top: 20%; left: 20%; display : block;");
        a = 1;
    }
    a++;
}

function value2(){
    if(b %3 === 0){
        document.getElementById("title").setAttribute("style", "left : 40%;");
    }
    else if(b %3 === 1){
        document.getElementById("title").setAttribute("style", "right : 3%;");
    }
    else if(b %3 === 2){
        document.getElementById("title").setAttribute("style", "left : 1%;");
        b = -1;
    }
    b++;
}

function checkBox(obj){
    var x,s = document.getElementById('CHECKBOX');
    if(obj.value === 'vothuat')
        x= Boxvothuat();
    else if(obj.value === 'boiloi')
        x = Boxboiloi() ;
    else if(obj.value === 'dienkinh')
        x = Boxdienkinh();
    else
        x = 'hãy chọn sở thích';
    s.innerHTML = x;
}

function Boxvothuat(){
    return  '<input name="se1" type="checkbox" value="vovinam" />Vovinam' +
            '<input name="se2" type="checkbox" value="Judo" />Judo' +
            '<input name="se3" type="checkbox" value="Karate" />Karate';
}

function Boxboiloi(){
    return  '<input name="se1" type="checkbox" value="buom" />Bơi bướm' +
            '<input name="se2" type="checkbox" value="sai" />Bơi sải' +
            '<input name="se3" type="checkbox" value="ech" />Bơi ếch';
}

function Boxdienkinh(){
    return  '<input name="se1" type="checkbox" value="nuocrut" />Chạy nước rút' +
            '<input name="se2" type="checkbox" value="vietda" />Chạy việt dã' ;
}


