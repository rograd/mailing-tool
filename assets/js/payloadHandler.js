const form = document.forms['mail'];

form.onsubmit = e => {
    e.preventDefault();
    new FormData(e.target);
};

form.onformdata = async e => {
    const { action: url, method } = e.target;
    const body = e.formData;

    const res = await fetch(url, { method, body });

    if (!res.ok) return;

    const data = await res.text();
    showPopup(data);
};

const template = document.querySelector('template#popup');

const showPopup = error => {
    const clone = template.content.firstElementChild.cloneNode(true);
    const img = clone.querySelector('img');
    const p = clone.querySelector('p');
    const h4 = clone.querySelector('h4');

    if (error) {
        h4.innerText = 'Klops';
        p.innerText = error;
        img.src = 'assets/img/failmark.png';
        clone.classList.add('error');
    } else {
        h4.innerText = 'Sukces';
        p.innerText = 'Udało się wyslać wiadomość';
        img.src = 'assets/img/checkmark.png';
    }
    
    const timer = clone.querySelector('.timer');
    const total = 6 * 1000;
    let remaining = total;
    const timeout = 10;
    const interval = setInterval(() => {
        if (remaining <= 0) {
            clearInterval(interval);
            clone.remove();
        }
        remaining -= timeout;
        timer.style.width = `${remaining / total * 100}%`;
    }, timeout);

    document.querySelector('.popup__container').appendChild(clone);
};