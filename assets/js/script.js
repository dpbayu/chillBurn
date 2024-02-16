// Profile
profile = document.querySelector('nav .profile');
document.querySelector('#user-btn').onclick = () => {
   profile.classList.toggle('active');
}
window.onscroll = () => {
   profile.classList.remove('active');
}

// Loader
function loader() {
   document.querySelector('.loader').style.display = 'none';
}

function fadeOut() {
   setInterval(loader, 1000);
}
window.onload = fadeOut;
document.querySelectorAll('input[type="number"]').forEach(numberInput => {
   numberInput.oninput = () => {
      if (numberInput.value.length > numberInput.maxLength) numberInput.value = numberInput.value.slice(0, numberInput.maxLength);
   };
});

// Responsive
// $(function () {
//    $(window).resize(function () {
//       if (window.matchMedia('(min-width: 1441px)')) {
//          $('#overview').addClass('container');
//       } else {
//          $('#overview').removeClass('container');
//       }
//    });
// });
// $(function () {
//    $(window).resize(function () {
//       if (window.matchMedia('(min-width: 1441px)')) {
//          $('#subscribe').addClass('container');
//       } else {
//          $('#subscribe').removeClass('container');
//       }
//    });
// });