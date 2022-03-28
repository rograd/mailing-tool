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

    const data = await res.json();
    showPopup(data.error);
};

const template = document.querySelector('template#popup');

const showPopup = data => {
    const clone = template.content.firstElementChild.cloneNode(true);
    const [content, bar] = clone.children;
    
    clone.querySelector('ul li').innerText = data;
    const total = 6 * 1000;
    let remaining = total;
    const timeout = 10;
    const interval = setInterval(() => {
        if (remaining <= 0) {
            clearInterval(interval);
            clone.remove();
        }
        remaining -= timeout;
        bar.style.width = `${remaining / total * 100}%`;
    }, timeout);

    clone.addEventListener('click', e => {
        console.log(e);
    });

    document.querySelector('.popup__container').appendChild(clone);
};