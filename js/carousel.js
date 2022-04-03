const cards = document.querySelectorAll('[data-js="carousel__item"]');
const btnNext =  document.querySelector('[data-js="carousel__button--next"]');
const btnPrev =  document.querySelector('[data-js="carousel__button--prev"]');
let indiceCard = 0;

btnNext.addEventListener('click', () =>{
    if(indiceCard === cards.length - 1){
        indiceCard = 0;
    }else{
        indiceCard++;
    }
    cards.forEach(card => {
        console.log(card.classList)
        card.classList.remove('carousel__item--visible');
    })


    cards[indiceCard].classList.add('carousel__item--visible');
})

btnPrev.addEventListener('click', () =>{
    if(indiceCard === 0){
        indiceCard = cards.length -1;
    }else{
        indiceCard--;
    }
    cards.forEach(card => {
        console.log(card.classList)
        card.classList.remove('carousel__item--visible');
    })


    cards[indiceCard].classList.add('carousel__item--visible');
})