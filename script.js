// tombol burger untuk menu
let hamburger = document.getElementById("hamburger");
let navigation = document.querySelector(".navigation");
hamburger.addEventListener("click", function () {
  navigation.classList.toggle("display_block");
});

/*===== REMOVE MENU MOBILE =====*/
const navLink = document.querySelectorAll('.nav__link')

function linkAction(){
    const navMenu = document.querySelector(".navigation");
    navMenu.classList.remove('display_block');
}
navLink.forEach(n => n.addEventListener('click', linkAction))

// animation for anchor
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
  anchor.addEventListener('click', function (e) {
    e.preventDefault();

    document.querySelector(this.getAttribute('href')).scrollIntoView({
      behavior: 'smooth'
    });
  });
});