// Profile
profile = document.querySelector('nav .profile');
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