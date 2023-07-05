window.addEventListener("scroll", function () {
   var header = document.querySelector("header");
   header.classList.toggle("sticky", window.scrollY > 0);
})

// Menu
navbar = document.querySelector('.header .flex .navbar');
document.querySelector('#menu-btn').onclick = () => {
   navbar.classList.toggle('active');
   profile.classList.remove('active');
}

// Profile
profile = document.querySelector('.header .flex .profile');
document.querySelector('#user-btn').onclick = () => {
   profile.classList.toggle('active');
   navbar.classList.remove('active');
}
window.onscroll = () => {
   navbar.classList.remove('active');
   profile.classList.remove('active');
}

// Loader
function loader() {
   document.querySelector('.loader').style.display = 'none';
}

function fadeOut() {
   setInterval(loader, 100);
}
window.onload = fadeOut;
document.querySelectorAll('input[type="number"]').forEach(numberInput => {
   numberInput.oninput = () => {
      if (numberInput.value.length > numberInput.maxLength) numberInput.value = numberInput.value.slice(0, numberInput.maxLength);
   };
});