

const slides = document.querySelectorAll('.slide');
const totalSlide = slides.length;
var index = 0;
const prev = document.querySelector('.prev');
const next = document.querySelector('.next');

slideInfo();

prev.onclick = function(){
    slide('prev');
} 

next.onclick = function(){
    slide('next');
}

function slide(direction){

    if(direction=='next'){
        if(index==totalSlide-1){
            index = 0;
        }
        else{
            index++;
        }
    }

    if(direction=='prev'){
        if(index==0){
            index = totalSlide-1;
        }
        else{
            index--;
        }
    }
    
    for(var i =0; i<totalSlide; i++){
        slides[i].classList.remove('active');
    }
    slides[index].classList.add('active');

    slideInfo();
}

setInterval(autoSlide, 3000);

function slideInfo(){
    document.querySelector('.slideInfo').innerHTML = (index+1) + "/" + totalSlide;
}

function autoSlide(){
    slide('next');
}