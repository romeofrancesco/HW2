const section= document.querySelector('section');
const div = document.createElement('div');
div.classList.add('visualizza_punti');
section.appendChild(div);
const Contenitore = document.createElement('div');
Contenitore.classList.add('container');
div.appendChild(Contenitore);
const punto1 = document.createElement('div');
punto1.classList.add('punto');
punto1.setAttribute("id" , "punto1");
const punto2 = document.createElement('div');
punto2.classList.add('punto');
punto2.setAttribute("id" , "punto2");
const punto3 = document.createElement('div');
punto3.classList.add('punto');
punto3.setAttribute("id" , "punto3");
Contenitore.appendChild(punto1);
Contenitore.appendChild(punto2);
Contenitore.appendChild(punto3);
document.body.classList.add('no-scroll');
setTimeout(EliminaCaricamento , 4000 , div);

function EliminaCaricamento(div){
    div.remove();
    document.body.classList.remove('no-scroll');

}
function checkPw(event) {
    const input = event.currentTarget;
    if (formStatus[input.name] = input.value.length >= 8) {
        input.classList.remove('error');
        input.parentNode.querySelector('span').textContent = "";
    } else {
        input.classList.add('error');
        input.parentNode.querySelector('span').textContent = "La password contiene meno di 8 caratteri.";
        input.parentNode.querySelector('span').classList.add('error');
    }
    checkForm();
}
function checkForm() {
    Object.keys(formStatus).length !== 1 || 
    Object.values(formStatus).includes(false);
}

const formStatus = {'upload': true};
document.getElementsByName('PW')[0].addEventListener('blur', checkPw);