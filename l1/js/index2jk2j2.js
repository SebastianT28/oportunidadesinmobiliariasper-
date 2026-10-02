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

var section_items=$('.navsection'),
       navigation_items=$('#menu .one-page a');

    function updateNavigation() {
        section_items.each(function(){
            $this = $(this);
            var activeSection = $('#menu .one-page a[href="#'+$this.attr('id')+'"]').data('number') - 1;
            if ( ( $this.offset().top - $(window).height()/2 < $(window).scrollTop() ) && ( $this.offset().top + $this.height() - $(window).height()/2 > $(window).scrollTop() ) ) {
                navigation_items.eq(activeSection).addClass('active_menu');
            }else {
                navigation_items.eq(activeSection).removeClass('active_menu');
            }
        });
    }
    
    function smoothScroll(target){
        $('body,html').animate(
            {'scrollTop':target.offset().top}
            ,700);
        $('#menu').toggleClass('speed-in');
        $('.icon').toggleClass('active');
        $('#cd-shadow-layer').toggleClass('is-visible');
    }


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

var swiper = new Swiper(".testimonial-photos1", {
  effect: "coverflow",
  grabCursor: true,
  centeredSlides: true,
  coverflowEffect: {
    rotate: 0,
    stretch: 0,
    depth: 100,
    modifier: 3,
    slideShadows: true
  },
  keyboard: {
    enabled: true
  },
  speed: 1000,
  autoplay: {
    delay: 2500,
    disableOnInteraction: false
  },
  loop: true,
  pagination: {
    el: '.blog-slider__pagination',
    clickable: true
  },
  breakpoints: {
    640: {
      slidesPerView: 2
    },
    768: {
      slidesPerView: 2
    },
    1024: {
      slidesPerView: 2
    },
    4560: {
      slidesPerView: 3
    }
  }
});


const testislider = new Swiper(".testimonial-carousel", {
    autoHeight:true,
  loop: true,
  // speed: 12000,
  // autoplay: {
  //   delay: 1000,
  // },
  pagination:{
    el: '.blog-slider__pagination',
    clickable: true,
  },
  navigation:{
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
  allowTouchMove: false,
  disableOnInteraction: false
  
});



var gallery = new Swiper(".gallery-swiper", {
  effect: "coverflow",
  grabCursor: true,
  centeredSlides: true,
  slidesPerView: 1,
  coverflowEffect: {
    rotate: 0,
    stretch: 0,
    depth: 100,
    modifier: 2,
    slideShadows: true
  },
  speed: 2000,
   autoplay: {
    delay: 3000,
    disableOnInteraction: false
  },

  mousewheel: false,
  spaceBetween: 60,
  loop: true,
  pagination: {
    el: '.blog-slider__pagination',
    clickable: true
  },
  breakpoints: {
    580: {
      slidesPerView: 1.55

    },
    1024: {
      slidesPerView: 2
    }
  }
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
  segments: 6,
  centerX: 400,
  centerY: 400,
  minRadius: 340,
  maxRadius: 390,
  minDuration: 1,
  maxDuration: 8,
  maskID: '#mask' });



/*--------------------
Blob Background
--------------------*/
const blob2 = new SupahBlob({
  el: document.querySelector('#path-2'),
  segments: 4,
  centerX: 400,
  centerY: 400,
  minRadius: 320,
  maxRadius: 400,
  minDuration: 2,
  maxDuration: 5 });

// END SVG

$(document).ready(function() {

   
    // POPOVER BOTON LOGIN
      
    $("#profile-toggle").on("click", function() {
      $("#popover-perfil").toggleClass( "opened");
    });
    
    $(window).on('scroll', function(){
        updateNavigation();
    });
    
    navigation_items.on('click',function(event){
       event.preventDefault();
        smoothScroll($(this.hash));
    });


    $('#openmenu').click(function(){
        $('#menu').toggleClass('speed-in');
        $('.icon').toggleClass('active');
        $('#cd-shadow-layer').toggleClass('is-visible');
    });

    $('#cd-shadow-layer').click(function(){
        $('#menu').toggleClass('speed-in');
        $('.icon').toggleClass('active');
        $('#cd-shadow-layer').toggleClass('is-visible');
    });
  
});
