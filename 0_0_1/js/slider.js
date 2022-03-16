class slider {
    slideIndex = 1;
    
    constructor(options) {
        this.options = options;
        this.intialStuff();

        this.createNextAndPrevBtns();
        this.createDots();

        this.showSlides(1);

        this.setAuto();
    }


    intialStuff() {
        let { el : sliderElement , slideClass , auto} = this.options;

        if(! sliderElement ) throw Error('slider element is not exists');
        Number.isInteger(auto) ? this.auto = auto : this.auto = 0;
        this.sliders = [...sliderElement.children].filter(elm => elm.classList.contains(slideClass));
    }

    createNextAndPrevBtns() {
        let { el: sliderElement } = this.options;

        sliderElement.insertAdjacentHTML("beforeend" , `
            <a class="next">&#10095;</a>
            <a class="prev">&#10094;</a>
        `);

        sliderElement.querySelector(".next").addEventListener("click" , () => this.nextAndPrevSlide(this.slideIndex += 1));
        sliderElement.querySelector(".prev").addEventListener("click" , () => this.nextAndPrevSlide(this.slideIndex -= 1));
    }

    nextAndPrevSlide = (x) => {
        this.resetAuto();
        this.showSlides(x);
    }

    currentSlide = n => {
        this.resetAuto();
        this.showSlides(this.slideIndex = n);
    }

    createDots() {
        let { el : sliderElement } = this.options;

        let dotElements = [...this.sliders].map((slider , index) => `<span class="dot" data-slide="${index+1}"></span>`);

        let dots = document.createElement("div");
        dots.classList.add("dots");
        dots.innerHTML = `${dotElements.join("")}`;

        sliderElement.after(dots);

        this.dots = dots.querySelectorAll(".dot");
        this.dots.forEach(dot => dot.addEventListener("click" , e => this.currentSlide(parseInt(e.target.dataset.slide))));
    }

    showSlides(number) {
        let { el : sliderElement , slideClass , currentSlider } = this.options;
        
        if(number > this.sliders.length) this.slideIndex = 1;
        if(number < 1 ) this.slideIndex = this.sliders.length;

        sliderElement.querySelector(`.${slideClass}.active`).classList.remove("active");
        this.dots.forEach(dot => dot.classList.remove("active"));

        this.sliders[this.slideIndex-1].classList.add("active");
        this.sliders[this.slideIndex-1].classList.add("fade");
        this.dots[this.slideIndex-1].classList.add("active");

        if(currentSlider) currentSlider(this.sliders[this.slideIndex-1]);
    }

    setAuto () {
        if(this.auto != 0) {
            this.autoID = setInterval(() => this.showSlides(this.slideIndex += 1) , this.auto);
        }
    }

    resetAuto () {
        clearInterval(this.autoID);
        this.setAuto();
    }
}