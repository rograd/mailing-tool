function elementFromHtml(html) {
    const div = document.createElement('div');
    div.innerHTML = html.trim();
    return div.firstElementChild;
}

const attachments = new Map();
const fileContainer = document.querySelector('.attachments');

const addAttachment = file => {
    const uid = Math.floor(Date.now() * Math.random()).toString(36);

    attachments.set(uid, file);

    let { name, size } = file;
    size /= 1024;
    size = Math.floor(size * 100) / 100;

    const htmlElem = elementFromHtml(`
        <div class="file">
            <span data-id="${uid}" class="delete">&#x2716;</span>
            <span>${name}</span>
            <span>(${size}Mb)</span>
        </div>
    `);

    htmlElem.querySelector('.delete').addEventListener('click', e => {
        const { id } = e.target.dataset;
        attachments.delete(id);
        e.target.parentNode.remove();
    });

    fileContainer.appendChild(htmlElem);
};

const handleFiles = target => {
    const files = [...target.files];
    files.forEach(addAttachment);
    target.value = '';
};

const handleFormData = async e => {
    const { target, formData } = e;

    const body = target.querySelector('#mail-body').innerText;
    formData.set('body', body);

    attachments.forEach(file => formData.append('attachments[]', file));

    const { action: url, method } = target;
    const res = await fetch(url, { method, body: formData });
    if (!res.ok) return;

    const data = await res.text();
    console.log(data);
};

const handleSubmit = e => {
    e.preventDefault();
    e.target.onformdata = handleFormData;
    new FormData(e.target);
};