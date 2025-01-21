
const nextButton = document.querySelector('.siguiente');
const prevButton = document.querySelector('.back');
const steps = document.querySelectorAll('.step');
const form_steps = document.querySelectorAll('.form-step');
let active = 1;

nextButton.addEventListener('click', () => {
    active++;
    if(active > steps.length){
        active = steps.length;
    }
    updateProgress();
});

prevButton.addEventListener('click', () =>{
    active--;
    if(active < 1){
        active = 1;
    }
    updateProgress();
});

const updateProgress = () => {
    console.log('steps.length =>' + steps.legth);
    console.log('active => ' + active);

    steps.forEach((step, i) => {
    if(i == (active-1)){
        step.classList.add('active');
        form_steps[i].classList.add('active');
        console.log('i =>' +1);
    } else {
        step.classList.remove('active');
        form_steps[i].classList.remove('active');
    }
 });

    if(active === 1){
        prevButton.disabled = true;
    }else if (active === steps.legth){
        nextButton.disabled = true;
    } else {
        prevButton.disabled = false;
        nextButton.disabled = false;
    }

}




