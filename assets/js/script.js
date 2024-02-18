// Profile
profile = document.querySelector('nav .profile');
document.querySelector('#user-btn').onclick = () => {
   profile.classList.toggle('active');
}
window.onscroll = () => {
   profile.classList.remove('active');
}

nav = document.querySelector("nav");
window.onscroll = function () {
   if (document.documentElement.scrollTop > 20) {
      nav.classList.add("sticky");
   } else {
      nav.classList.remove("sticky");
   }
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