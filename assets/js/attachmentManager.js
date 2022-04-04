const container = document.querySelector('.files');
const fileTemplate = document.querySelector('#file');

const addAttachment = (attachment, i) => {
    const clone = fileTemplate.content.cloneNode(true);

    const removeButton = clone.querySelector('.remove');
    removeButton.onclick = e => e.target.parentNode.remove();

    const input = clone.querySelector('input');
    input.onclick = e => e.preventDefault();

    const transfer = new DataTransfer();
    transfer.items.add(attachment);
    input.files = transfer.files;

    container.appendChild(clone);
};

const handleFiles = target => {
    const files = [...target.files];
    files.forEach(addAttachment);
    target.value = '';
};