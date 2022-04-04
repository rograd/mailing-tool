const form = document.forms['mail'];

form.onsubmit = e => {
    e.preventDefault();
    new FormData(e.target);
};

form.onformdata = async e => {
    // console.dir(e.target.children.body.innerText);
    // e.formData.append('body', '');

    const { action: url, method } = e.target;
    const body = e.formData;

    const res = await fetch(url, { method, body });

    if (!res.ok) return;

    const data = await res.text();
    showPopup(data);
};