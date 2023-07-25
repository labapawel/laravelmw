let btndaterej1 = document.querySelector('#btndaterej1');
let btndaterej2 = document.querySelector('#btndaterej2');
let daterej = document.querySelector('#daterej');

function obliczDate(ilelat)
{
    let now = new Date();
    now.setFullYear(now.getFullYear() + ilelat);
    console.log(now.toISOString().split('T'))
    daterej.value = now.toISOString().split('T')[0];
    // yyyy-mm-ddThh:mm:ss
}

btndaterej1.addEventListener('click', e=>{
    obliczDate(1);
})


btndaterej2.addEventListener('click', e=>{
    obliczDate(2);
})
