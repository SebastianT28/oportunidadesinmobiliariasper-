$(window).on('scroll', function() {  

    if ($('.main-header').length) {
        var scrollPosition = 72;
        var header = $('.main-header');
        if ($(window).scrollTop() > scrollPosition) {
            header.removeClass('slideInUp animated').addClass('scrollheader slideInDown animated');
        } else if ($(this).scrollTop() <= scrollPosition) {
            header.removeClass('scrollheader slideInDown animated').addClass('slideInUp animated');
        }
    }             

});


  function Numeros(string){//Solo numeros
    var out = '';
    var filtro = '1234567890';//Caracteres validos
    
    //Recorrer el texto y verificar si el caracter se encuentra en la lista de validos 
    for (var i=0; i<string.length; i++)
       if (filtro.indexOf(string.charAt(i)) != -1) 
             //Se añaden a la salida los caracteres validos
         out += string.charAt(i);
    
    //Retornar valor filtrado
    return out;
    } 

// SLIDER SWIPER

const offer = new Swiper(".offer-slider", {
  slidesPerView:'auto',
  spaceBetween: 20,

  loop: true,
  speed: 12000,
  autoplay: {
    delay: 0,
  },
  allowTouchMove: false,
  disableOnInteraction: false
  
});



// END SLIDER SWIPER


// SVG WATER

/*--------------------
SupahBlob
--------------------*/
class SupahBlob {
  constructor(obj) {
    if (!obj.el) return;

    this.el = obj.el;
    this.segments = obj.segments || 8;
    this.centerX = obj.centerX || 400;
    this.centerY = obj.centerY || 400;
    this.minRadius = obj.minRadius || 300;
    this.maxRadius = obj.maxRadius || 380;
    this.minDuration = obj.minDuration || 1;
    this.maxDuration = obj.maxDuration || 2;
    this.maskEl = obj.maskEl || null;
    this.maskID = obj.maskID || null;

    this.init();
  }

  init() {
    this.points = [];
    const slice = Math.PI * 2 / this.segments;
    const tl = new gsap.timeline({
      onUpdate: () => {
        this.update();
      } });


    for (let i = 0; i < this.segments; i++) {
      const angle = slice * i;
      const duration = gsap.utils.random(this.minDuration, this.maxDuration);

      const p = {
        x: this.centerX + Math.cos(angle) * this.minRadius,
        y: this.centerX + Math.sin(angle) * this.minRadius };


      const tween = gsap.to(p, {
        duration,
        x: this.centerX + Math.cos(angle) * this.maxRadius,
        y: this.centerX + Math.sin(angle) * this.maxRadius,
        ease: 'sine.inOut',
        repeat: -1,
        yoyo: true });

      tl.add(tween, -duration);
      this.points.push(p);
    }
  }

  update() {
    this.el.setAttribute('d', this.createPath());

    // Force clipPath update
    if (this.maskEl) {
      this.maskEl.style.clipPath = 'none';
      this.maskEl.style.webkitClipPath = 'none';
      this.maskEl.offsetWidth;
      this.maskEl.style.clipPath = `url("${this.maskID}")`;
      this.maskEl.style.webkitClipPath = `url("${this.maskID}")`;
    }
  }

  createPath() {
    const data = this.points;
    const size = this.points.length;

    let path = `M${data[0].x} ${data[0].y} C`;

    for (let i = 0; i < size; i++) {
      const p0 = data[(i - 1 + size) % size];
      const p1 = data[i];
      const p2 = data[(i + 1) % size];
      const p3 = data[(i + 2) % size];

      const x1 = p1.x + (p2.x - p0.x) * 0.15;
      const y1 = p1.y + (p2.y - p0.y) * 0.15;
      const x2 = p2.x - (p3.x - p1.x) * 0.15;
      const y2 = p2.y - (p3.y - p1.y) * 0.15;

      path += ` ${x1} ${y1} ${x2} ${y2} ${p2.x} ${p2.y}`;
    }

    return `${path}z`;
  }}



/*--------------------
Blob Mask
--------------------*/
const blob1 = new SupahBlob({
  el: document.querySelector('#path-1'),
  segments: 9,
  centerX: 400,
  centerY: 400,
  minRadius: 300,
  maxRadius: 380,
  minDuration: 1,
  maxDuration: 3,
  maskID: '#mask' });



/*--------------------
Blob Background
--------------------*/
const blob2 = new SupahBlob({
  el: document.querySelector('#path-2'),
  segments: 9,
  centerX: 400,
  centerY: 400,
  minRadius: 320,
  maxRadius: 400,
  minDuration: 2,
  maxDuration: 3 });

// END SVG

$(document).ready(function() {

   
    // POPOVER BOTON LOGIN
      
    $("#profile-toggle").on("click", function() {
      $("#popover-perfil").toggleClass( "opened");
    });
    
    $('#openmenu').click(function(){
        //$(".menu > ul").toggleClass('show-on-mobile');
        $('.icon').toggleClass('active');
        $('#cd-shadow-layer').toggleClass('is-visible');
    });

    $('#cd-shadow-layer').click(function(){
        //$(".menu > ul").toggleClass('show-on-mobile');
        $('.icon').toggleClass('active');
        $('#cd-shadow-layer').toggleClass('is-visible');
    });
  
});


// MENUS

/*=============== SHOW MENU ===============*/
const showMenu = (toggleId, navId) =>{
   const toggle = document.getElementById(toggleId),
         nav = document.getElementById(navId)

   toggle.addEventListener('click', () =>{
       // Add show-menu class to nav menu
       nav.classList.toggle('show-menu')
       // Add show-icon to show and hide menu icon
       toggle.classList.toggle('show-icon')
   })
}

showMenu('nav-toggle','nav-menu')

/*=============== SHOW DROPDOWN MENU ===============*/
const dropdownItems = document.querySelectorAll('.dropdown__item')

// 1. Select each dropdown item
dropdownItems.forEach((item) =>{
    const dropdownButton = item.querySelector('.dropdown__button') 

    // 2. Select each button click
    dropdownButton.addEventListener('click', () =>{
        // 7. Select the current show-dropdown class
        const showDropdown = document.querySelector('.show-dropdown')
        
        // 5. Call the toggleItem function
        toggleItem(item)

        // 8. Remove the show-dropdown class from other items
        if(showDropdown && showDropdown!== item){
            toggleItem(showDropdown)
        }
    })
})

// 3. Create a function to display the dropdown
const toggleItem = (item) =>{
    // 3.1. Select each dropdown content
    const dropdownContainer = item.querySelector('.dropdown__container')

    // 6. If the same item contains the show-dropdown class, remove
    if(item.classList.contains('show-dropdown')){
        dropdownContainer.removeAttribute('style')
        item.classList.remove('show-dropdown')
    } else{
        // 4. Add the maximum height to the dropdown content and add the show-dropdown class
        dropdownContainer.style.height = dropdownContainer.scrollHeight + 'px'
        item.classList.add('show-dropdown')
    }
}

/*=============== DELETE DROPDOWN STYLES ===============*/
const mediaQuery = matchMedia('(min-width: 1118px)'),
      dropdownContainer = document.querySelectorAll('.dropdown__container')

// Function to remove dropdown styles in mobile mode when browser resizes
const removeStyle = () =>{
    // Validate if the media query reaches 1118px
    if(mediaQuery.matches){
        // Remove the dropdown container height style
        dropdownContainer.forEach((e) =>{
            e.removeAttribute('style')
        })

        // Remove the show-dropdown class from dropdown item
        dropdownItems.forEach((e) =>{
            e.classList.remove('show-dropdown')
        })
    }
}

addEventListener('resize', removeStyle)