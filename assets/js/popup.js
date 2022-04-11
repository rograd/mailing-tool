class Popup {
    TIME = 6 * 1000;
    SUCCESS_IMG = 'success.png';
    FAIL_IMG = 'fail.png';
    TEMPLATE = document.querySelector('template#popup').content.firstElementChild;
    CONTAINER = document.querySelector('.popup__container');

    constructor(error) {
        this.header = error ? 'Suckes' : 'Klops';
        this.content = error ?? 'Udało się wyslać wiadomość';
    }

    show() {
        const clone = this.TEMPLATE.cloneNode(true);

        const img = clone.querySelector('img');
        const p = clone.querySelector('p');
        const h4 = clone.querySelector('h4');

        h4.innerText = this.header;
        p.innerText = this.content;
        

        if (error) {

            img.src = 'assets/img/failmark.png';
            clone.classList.add('error');
        } else {
            h4.innerText = 'Sukces';
            p.innerText = 'Udało się wyslać wiadomość';
            img.src = 'assets/img/checkmark.png';
        }

        const timer = clone.querySelector('.timer');
        const total = this.TIME * 1000;
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

        this.CONTAINER.appendChild(clone);
    }
}