/* -------to-top------- */
const toTop = document.querySelector(".to-top");

window.addEventListener("scroll", () => {
  if (window.pageYOffset > 100) {
    toTop.classList.add("active");
  } else {
    toTop.classList.remove("active");
  }
})

/* ----------Details product ---------- */

const baoquan = document.querySelector(".baoquan")
const chitiet = document.querySelector(".chitiet")


if(baoquan)
{
        baoquan.addEventListener("click",function(){
        document.querySelector(".product-content-right-bottom-content-chitiet").style.display = "none";
        document.querySelector(".product-content-right-bottom-content-baoquan").style.display = "block";
        document.querySelector('.product-content-right-bottom-content-baoquan').style.background = 'orange';



     })
}

if(chitiet)
{
        chitiet.addEventListener("click",function(){
        document.querySelector(".product-content-right-bottom-content-chitiet").style.display = "block";
        document.querySelector(".product-content-right-bottom-content-baoquan").style.display = "none";
        document.querySelector('.product-content-right-bottom-content-chitiet').style.background = 'yellow';

     })
}
 

/* ------detail product end------ */

const butTon = document.querySelector(".product-content-right-bottom-top")
if(butTon)
{
    butTon.addEventListener("click", function(){
        document.querySelector(".product-content-right-bottom-content-big").classList.toggle("activeB")
    })
}
/* validate password */
/* var c_password = document.getElementByName("c_password")
  , c_password_confirm = document.getElementByName("c_password_confirm");

function validatePassword(){
  if(c_password.value != c_password_confirm.value) {
    c_password_confirm.setCustomValidity("Passwords Don't Match");
  } else {
    c_password_confirm.setCustomValidity('');
  }
}

c_password.onchange = validatePassword;
c_password_confirm.onkeyup = validatePassword; */

var c_password =document.getElementById("c_password");
var c_password_confirm =document.getElementById("c_password_confirm");

function validatePassword(){
  if(c_password.value != c_password_confirm.value){
    c_password_confirm.setCustomValidity("Mật khẩu không khớp");
  }else{
    c_password_confirm.setCustomValidity('');

  }
}
c_password.onchange = validatePassword;
c_password_confirm.onkeyup = validatePassword;


//sent mail
if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
}



