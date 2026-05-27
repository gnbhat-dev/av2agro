//step 1: get DOM
let nextDom = document.getElementById('next');
let prevDom = document.getElementById('prev');

let carouselDom = document.querySelector('.carousel');
let SliderDom = carouselDom.querySelector('.carousel .list');
let thumbnailBorderDom = document.querySelector('.carousel .listThumbnail');
let thumbnailItemsDom = thumbnailBorderDom.querySelectorAll('.item');
let timeDom = document.querySelector('.carousel .time');

thumbnailBorderDom.appendChild(thumbnailItemsDom[0]);
let timeRunning = 3000;
let timeAutoNext = 7000;

nextDom.onclick = function(){
    showSlider('next');    
}

prevDom.onclick = function(){
    showSlider('prev');    
}
let runTimeOut;
let runNextAuto = setTimeout(() => {
    next.click();
}, timeAutoNext)
function showSlider(type){
    let  SliderItemsDom = SliderDom.querySelectorAll('.carousel .list .item');
    let thumbnailItemsDom = document.querySelectorAll('.carousel .listThumbnail .item');
    
    if(type === 'next'){
        SliderDom.appendChild(SliderItemsDom[0]);
        thumbnailBorderDom.appendChild(thumbnailItemsDom[0]);
        carouselDom.classList.add('next');
    }else{
        SliderDom.prepend(SliderItemsDom[SliderItemsDom.length - 1]);
        thumbnailBorderDom.prepend(thumbnailItemsDom[thumbnailItemsDom.length - 1]);
        carouselDom.classList.add('prev');
    }
    clearTimeout(runTimeOut);
    runTimeOut = setTimeout(() => {
        carouselDom.classList.remove('next');
        carouselDom.classList.remove('prev');
    }, timeRunning);

    clearTimeout(runNextAuto);
    runNextAuto = setTimeout(() => {
        next.click();
    }, timeAutoNext)
}
//testimonial//
$('.testi_main').owlCarousel({
    loop:true,
    margin:45,
    dots:true,
     autoplay:true,
     smartSpeed:800,
    responsiveClass:true,
    
    
        responsive:{
        0:{
          items:1,
            nav:true,
            loop:true,
            autoplay:true
        },
         600:{
            items:2,
            nav:false,
             autoplay:true
        },
        800:{
            items:2,
            nav:false,
             autoplay:true
        },
        1000:{
          items:3,
            nav:true,
            loop:true,
           
        }
    }
})

//blog//
$('.update_main').owlCarousel({
    loop:true,
    margin:15,
    dots:true,
    nav:false,
    responsiveClass:true,
    
    
        responsive:{
        0:{
          items:1,
           
            loop:true,
            autoplay:true
        },
         600:{
            items:2,
            nav:false,
             autoplay:true
        },
        800:{
            items:2,
            nav:false,
             autoplay:true
        },
        1000:{
          items:3,
           
            loop:true,
            autoplay:false
        }
    }
})
document.addEventListener("DOMContentLoaded", () => {
  const counters = document.querySelectorAll(".counter");

  const animateCounter = (counter) => {
    const target = +counter.getAttribute("data-target");
    let count = 0;

    const updateCount = () => {
      const increment = target / 80;

      if (count < target) {
        count += increment;
        if (target >= 1000000) {
          counter.innerText = Math.floor(count / 1000000);
        } else if (target >= 1000) {
          counter.innerText = Math.floor(count / 1000);
        } else {
          counter.innerText = Math.floor(count);
        }
        requestAnimationFrame(updateCount);
      } else {
        if (target >= 1000000) {
          counter.innerText = Math.floor(target / 1000000);
        } else if (target >= 1000) {
          counter.innerText = Math.floor(target / 1000);
        } else {
          counter.innerText = target;
        }
      }
    };

    updateCount();
  };

  const observer = new IntersectionObserver((entries, observer) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        animateCounter(entry.target);
        observer.unobserve(entry.target);
      }
    });
  }, {
    threshold: 0.4
  });

  counters.forEach(counter => {
    observer.observe(counter);
  });
});

// 
$('.division_wrapper').owlCarousel({
    loop:true,
    margin:45,
    dots:true,
     autoplay:true,
     smartSpeed:800,
    responsiveClass:true,
    
    
        responsive:{
        0:{
          items:1,
            nav:true,
            loop:true,
            autoplay:true
        },
         600:{
            items:1,
            nav:false,
             autoplay:true
        },
        800:{
            items:1,
            nav:false,
             autoplay:true
        },
        1000:{
          items:1,
            nav:true,
            loop:true,
           
        }
    }
})