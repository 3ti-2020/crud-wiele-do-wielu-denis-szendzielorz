const num = [0,1,2,3,4,5,6,7,8,9,'A','B','C','D','E','F'];

const Btn = document.querySelector('.Btn');

const Bcg = document.querySelector('.container');

const hex = document.querySelector('.hex');

Btn.addEventListener('click', gHex);
function gHex (){
    let hexCol = '#';

    for(let i = 0; i<6; i++){
        let random = Math.floor(Math.random()*num.length);

        hexcol +=num[random];


    }

    Bcg.style.backgroundColor = hexCol;
    hex.innerHTML = hexCol;

}