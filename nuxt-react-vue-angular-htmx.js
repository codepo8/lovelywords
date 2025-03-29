let current = false;
let dts = document.querySelectorAll('dt');
let all = dts.length - 1;
let show = num => {
    if (current) {
        current.className = ''
    }
    if (dts[num]) {
        current = dts[num];
        current.className = 'current';
        window.location.hash = num + '-' + current.innerText;
    } else {
        let rand = Math.round(Math.random() * all);
        current = dts[rand];
        current.className = 'current';
        window.location.hash = rand + '-' + current.innerText;
    }
}
if (window.location.hash) {
    let num = window.location.hash.split('-')[0].replace('#','');
    if (dts[num]) {
        show(num)
    }
    if (num === 'all') {
        document.querySelector('link').href ='bootstrapquery.css';
        document.querySelector('button').remove();
        document.querySelector('a.all').remove();
    }
} else {
    show();
}
document.querySelector('button')?.addEventListener('click', ev => {
    show();
    ev.preventDefault();
})
