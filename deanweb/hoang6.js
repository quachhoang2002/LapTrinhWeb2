

const userclick=document.querySelector('.user')
const modal=document.querySelector('.modal')

const modalcontainer=document.querySelector('.modal-container')
const modalcontainer2=document.querySelector('.modal-container-2')

const modalClose=document.querySelector('.close-button')
const modalClose2=document.querySelector('.close-button-2')

const modalLogin=document.querySelector('.js-login')
const modalRegister=document.querySelector('.js-register')

userclick.addEventListener('click',function(){

    modal.classList.add('open')
    modalcontainer.classList.add('active')

})
modalLogin.addEventListener('click',function(){
    modalcontainer2.classList.remove('active')
    modalcontainer.classList.add('active')

})

modalClose.addEventListener('click',function(){
    modal.classList.remove('open')
    modalcontainer.classList.remove('active')
    modalcontainer2.classList.remove('active')
})


modalRegister.addEventListener('click',function(){
    modalcontainer.classList.remove('active')
    modalcontainer2.classList.add('active')

})

modalClose2.addEventListener('click',function(){
    modal.classList.remove('open')
    modalcontainer.classList.remove('active')
    modalcontainer2.classList.remove('active')
})

var slideIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("slide");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > x.length) {slideIndex = 1}
  x[slideIndex-1].style.display = "block";
  setTimeout(carousel, 2000); // Change image every 2 seconds
}



let span = document.getElementsByTagName('span');
	let product = document.getElementsByClassName('item')
	let product_page = Math.ceil(product.length/4);
	let l = 0;
	let movePer = 25.34;
	let maxMove = 126;
	// mobile_view	
	let mob_view = window.matchMedia("(max-width: 768px)");
	if (mob_view.matches)
	 {
	 	movePer = 52;
	 	maxMove = 504;
	 }

	let right_mover = ()=>{
		l = l + movePer;
		if (product == 1){l = 0; }
		for(const i of product)
		{
			if (l > maxMove){l = l - movePer;}
			i.style.left = '-' + l + '%';
		}

	}
	let left_mover = ()=>{
		l = l - movePer;
		if (l<=0){l = 0;}
		for(const i of product){
			if (product_page>1){
				i.style.left = '-' + l + '%';
			}
		}
	}
	span[1].onclick = ()=>{right_mover();}
	span[0].onclick = ()=>{left_mover();}




    function opennews() {
        document.getElementById("news-pop").style.display = "block";
         document.getElementById("news-pop2").style.display = "none";
         document.getElementById("news-pop3").style.display = "none";
   }
    function opennews2() {
      document.getElementById("news-pop").style.display = "none";
         document.getElementById("news-pop2").style.display = "block";
         document.getElementById("news-pop3").style.display = "none";
   }
    function opennews3() {
         document.getElementById("news-pop").style.display = "none";
         document.getElementById("news-pop2").style.display = "none";
        document.getElementById("news-pop3").style.display = "block";
   }
   
 
 
 const closeTitle=document.querySelector('.ti-angle-up')
 const closeTitle1=document.querySelector('.up2')
 const closeTitle2=document.querySelector('.up3')
 
 closeTitle.addEventListener('click',()=>{
    document.getElementById("news-pop").style.display = "none";
    document.getElementById("news-pop2").style.display = "none";
   document.getElementById("news-pop3").style.display = "none";
 })

 closeTitle1.addEventListener('click',()=>{
    document.getElementById("news-pop").style.display = "none";
    document.getElementById("news-pop2").style.display = "none";
   document.getElementById("news-pop3").style.display = "none";
 })

 closeTitle2.addEventListener('click',()=>{
    document.getElementById("news-pop").style.display = "none";
    document.getElementById("news-pop2").style.display = "none";
   document.getElementById("news-pop3").style.display = "none";
 })
      


 
 const cartIconClick=document.querySelector('.Cart-Icon')

 cartIconClick.addEventListener('click',()=>{
  document.querySelector(".cart-box").style.display="flex" 
 
  
 } ) 
     
const closeCart=document.querySelector('.close-cart')


closeCart.addEventListener('click',()=>{
   document.querySelector('.cart-box').style.display="none"
})

const openItemPage=document.querySelector('.item-page')
openItemPage.addEventListener('click',()=>{
document.querySelector('#content').style.display="block"
document.querySelector('.content').style.display="none"

})


const openPage=document.querySelector('.pagebutton')
openPage.addEventListener('click',()=>{
document.querySelector('#content').style.display="none"
document.querySelector('.content').style.display="block"

})


const filter=document.querySelector('.Filter')

filter.addEventListener('click',()=>{
document.querySelector('#contentprod').style.display="none"
document.querySelector('#contentprod-1').style.display="block"
document.querySelector('.wrapperr').style.display="block"
document.querySelector('.Filter').style.display="none"
document.querySelector('.ti-angle-double-left').style.display="block"
document.querySelector('#Product1').style.display="block"

})
const closeFilter=document.querySelector('.ti-angle-double-left')
closeFilter.addEventListener('click',()=>{
  document.querySelector('#contentprod').style.display="block"
  document.querySelector('#contentprod-1').style.display="none"
  document.querySelector('.wrapperr').style.display="none"
  document.querySelector('.Filter').style.display="block"
  document.querySelector('.ti-angle-double-left').style.display="none"
 
})



function filterProduct(value) {
   
  let buttons = document.querySelectorAll(".button-value");

  let elements = document.querySelectorAll(".productbox1");

  

  elements.forEach((element) => {
    
    if (value == "all") {
      element.classList.remove("hide");
    } else {
   
      if (element.classList.contains(value)) {
       
        element.classList.remove("hide");
      } else {
      
        element.classList.add("hide");
      }
    }
  });
}  

document.getElementById("filprice").addEventListener("click", () => {
  let price1Input = document.getElementById("price1-input").value;
  let price2Input = document.getElementById("price2-input").value;
  let elements = document.querySelectorAll(".ProductPrice");
 
  let cards = document.querySelectorAll(".productbox1");
 

  elements.forEach((element, index)=> {
  
   
    if ((element.value > price1Input) && (element.value < price2Input)) {
      
      cards[index].classList.remove("hide");
  } else {
    
    cards[index].classList.add("hide");
    
  }
});
})
document.getElementById("search").addEventListener("click", () => {
  
  let searchInput = document.getElementById("search-input").value;
  let elements = document.querySelectorAll(".ProductName");
  let cards = document.querySelectorAll(".productbox1");
   

  elements.forEach((element, index) => {
  
  v
    if (element.innerText.includes(searchInput.toUpperCase())) {
      
      cards[index].classList.remove("hide");
    } else {
      
      cards[index].classList.add("hide");
    }
  });
});


window.onload = () => {
  filterProduct("all");
};
 





