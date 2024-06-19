// slick slide
$(document).ready(function(){
    $('.D4').slick({
      slidesToShow: 4,
      slidesToScroll: 1,
      infinite: true,
      autoplay: true,
      autoplaySpeed: 2500,
      // dots:true,
    });
  });

  // 

   /*cuộn tự động dùng animation khi vào khung hình*/
   window.addEventListener('scroll', function() {
    const productCards = document.querySelectorAll('.D4-item');
    productCards.forEach(card => {
      const position = card.getBoundingClientRect().top;
      const windowHeight = window.innerHeight;
      const animationName = 'slideIn';
      
      if (position < windowHeight && !card.classList.contains('animated')) {
        card.style.animation = `${animationName} 0.9s linear forwards`;
        card.classList.add('animated');
      } else if (position > windowHeight && card.classList.contains('animated')) {
        card.style.animation = '';
        card.classList.remove('animated');
      }
    });
  });


   /*cuộn tự động dùng animation khi vào khung hình*/
   window.addEventListener('scroll', function() {
    const productCards = document.querySelectorAll('.parent');
    productCards.forEach(card => {
      const position = card.getBoundingClientRect().top;
      const windowHeight = window.innerHeight;
      const animationName = 'slideIn';
      
      if (position < windowHeight && !card.classList.contains('animated')) {
        card.style.animation = `${animationName} 0.8s linear forwards`;
        card.classList.add('animated');
      } else if (position > windowHeight && card.classList.contains('animated')) {
        card.style.animation = '';
        card.classList.remove('animated');
      }
    });
  });



  

  window.addEventListener('scroll', function() {
    const productCards = document.querySelectorAll('.form-select');
    productCards.forEach(card => {
      const position = card.getBoundingClientRect().top;
      const windowHeight = window.innerHeight;
      const animationName = 'fadeInLeft';
      
      if (position < windowHeight && !card.classList.contains('animated')) {
        card.style.animation = `${animationName} 0.8s linear forwards`;
        card.classList.add('animated');
      } else if (position > windowHeight && card.classList.contains('animated')) {
        card.style.animation = '';
        card.classList.remove('animated');
      }
    });
  });


  window.addEventListener('scroll', function() {
    const productCards = document.querySelectorAll('.item-box');
    productCards.forEach(card => {
      const position = card.getBoundingClientRect().top;
      const windowHeight = window.innerHeight;
      const animationName = 'slideIn';
      
      if (position < windowHeight && !card.classList.contains('animated')) {
        card.style.animation = `${animationName} 0.8s linear forwards`;
        card.classList.add('animated');
      } else if (position > windowHeight && card.classList.contains('animated')) {
        card.style.animation = '';
        card.classList.remove('animated');
      }
    });
  });

  window.addEventListener('scroll', function() {
    const productCards = document.querySelectorAll('.img-content');
    productCards.forEach(card => {
      const position = card.getBoundingClientRect().top;
      const windowHeight = window.innerHeight;
      const animationName = 'slideIn';
      
      if (position < windowHeight && !card.classList.contains('animated')) {
        card.style.animation = `${animationName} 0.8s linear forwards`;
        card.classList.add('animated');
      } else if (position > windowHeight && card.classList.contains('animated')) {
        card.style.animation = '';
        card.classList.remove('animated');
      }
    });
  });


  window.addEventListener('scroll', function() {
    const productCards = document.querySelectorAll('.infor');
    productCards.forEach(card => {
      const position = card.getBoundingClientRect().top;
      const windowHeight = window.innerHeight;
      const animationName = 'slideIn';
      
      if (position < windowHeight && !card.classList.contains('animated')) {
        card.style.animation = `${animationName} 0.8s linear forwards`;
        card.classList.add('animated');
      } else if (position > windowHeight && card.classList.contains('animated')) {
        card.style.animation = '';
        card.classList.remove('animated');
      }
    });
  });
//soluong


function increaseQuantity() {
  var quantityInput = document.getElementById('quantity');
  var quantity = parseInt(quantityInput.value);
  quantityInput.value = quantity + 1;
}

function decreaseQuantity() {
  var quantityInput = document.getElementById('quantity');
  var quantity = parseInt(quantityInput.value);
  if (quantity > 0) {
    quantityInput.value = quantity - 1;
  }
}

function increaseQuantity1() {
  var quantityInput = document.getElementById('quantity1');
  var quantity = parseInt(quantityInput.value);
  quantityInput.value = quantity + 1;
}

function decreaseQuantity1() {
  var quantityInput = document.getElementById('quantity1');
  var quantity = parseInt(quantityInput.value);
  if (quantity > 0) {
    quantityInput.value = quantity - 1;
  }
}


function increaseQuantity2() {
  var quantityInput = document.getElementById('quantity2');
  var quantity = parseInt(quantityInput.value);
  quantityInput.value = quantity + 1;
}

function decreaseQuantity2() {
  var quantityInput = document.getElementById('quantity2');
  var quantity = parseInt(quantityInput.value);
  if (quantity > 0) {
    quantityInput.value = quantity - 1;
  }
}

function increaseQuantity3() {
  var quantityInput = document.getElementById('quantity3');
  var quantity = parseInt(quantityInput.value);
  quantityInput.value = quantity + 1;
}

function decreaseQuantity3() {
  var quantityInput = document.getElementById('quantity3');
  var quantity = parseInt(quantityInput.value);
  if (quantity > 0) {
    quantityInput.value = quantity - 1;
  }
}

function increaseQuantity4() {
  var quantityInput = document.getElementById('quantity4');
  var quantity = parseInt(quantityInput.value);
  quantityInput.value = quantity + 1;
}

function decreaseQuantity4() {
  var quantityInput = document.getElementById('quantity4');
  var quantity = parseInt(quantityInput.value);
  if (quantity > 0) {
    quantityInput.value = quantity - 1;
  }
}

function increaseQuantity5() {
  var quantityInput = document.getElementById('quantity5');
  var quantity = parseInt(quantityInput.value);
  quantityInput.value = quantity + 1;
}

function decreaseQuantity5() {
  var quantityInput = document.getElementById('quantity5');
  var quantity = parseInt(quantityInput.value);
  if (quantity > 0) {
    quantityInput.value = quantity - 1;
  }
}

