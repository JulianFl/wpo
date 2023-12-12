let menuIsOpen = false;
let dropdownIsOpen = false;

document.getElementById('menu-btn').addEventListener('click', () => {
    if (menuIsOpen === false) {
        menuIsOpen = true;
        const myImage = new Image(1270, 938);
        myImage.src = '../../content/pyramide.jpg';
        myImage.id = "pyramide"
        document.getElementById("menu-image").appendChild(myImage);
        document.getElementsByTagName('html')[0].classList.add('menu-is-open');
        return;
    }
    menuIsOpen = false;
    document.getElementsByTagName('html')[0].classList.remove('menu-is-open');
    document.getElementById("pyramide").remove();

});
document.querySelectorAll('[data-children="1"]').forEach((element) => {
    element.addEventListener('click', (e) => {
        toggleMenu(element)
    })
});
function toggleMenu(element){
    if (dropdownIsOpen === false) {
        dropdownIsOpen = true;
        element.nextElementSibling.classList.add('show');
        return;
    }
    dropdownIsOpen = false;
    element.nextElementSibling.classList.remove('show');
}

const container = document.getElementById('counter');

function handleIntersection(entries, observer) {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            const newDiv = document.createElement('div');
            newDiv.id =  'fixed-image';

            entry.target.appendChild(newDiv);

            observer.unobserve(entry.target);
        }
    });
}

const observer = new IntersectionObserver(handleIntersection);

if (container) observer.observe(container);

if (document.getElementById("maps-btn")){
    document.getElementById("maps-btn").addEventListener('click', () => {
        const iframe = document.createElement('iframe');
        iframe.src = "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2659.877765606774!2d8.339553916025118!3d48.18970657922769!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4790c6ded3b6d6d5%3A0x2275aaceef3d2644!2sVereinsgastst%C3%A4tte+Fu%C3%9Fball-+ballverein+1914+e.+V.!5e0!3m2!1sde!2sde!4v1536157707364"
        iframe.width = "100%"
        iframe.height = "450px"
        document.getElementById("iframe-placeholder").replaceWith(iframe)

    })
}