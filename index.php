<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mailing tool</title>
    <link rel="stylesheet" href="assets/css/default.css">
    <link rel="stylesheet" href="assets/css/form.css">
    <link rel="stylesheet" href="assets/css/popup.css">
    <style>
        div[contenteditable]:empty::before {
            content: 'Body';
        }
    </style>
</head>

<body>
    <main>
        <header>
            <h1>📧 Mailing tool</h1>
        </header>
        <form action="mail.php" method="POST" autocomplete="off" onsubmit="handleSubmit(event)" id="mail">
            <select name="sender">
                <option disabled selected hidden>-- Choose sender --</option>
                <option value="test">test</option>
                <?php foreach ([] as $account) { ?>
                    <option value="<?= $account['user'] ?>">
                        <?= $account['label'] ?>&lt;<?= $account['user'] ?>&gt;
                    </option>
                <?php } ?>
            </select>
            <input type="text" name="recipient" placeholder="Recipient">
            <input type="text" name="subject" placeholder="Subject">
            <div contenteditable id="mail-body"></div>
            <div class="attachments"></div>
        </form>
        <footer>
            <label class="attach-button">
                🔗<input type="file" multiple onchange="handleFiles(this)">
            </label>
            <button type="submit" form="mail">Send</button>
        </footer>
    </main>
    <div class="popup-container">
        <template id="popup">
            <div class="popup">
                <div class="popup-content">
                    <img>
                    <h4></h4>
                    <p></p>
                </div>
                <div class="popup-timer"></div>
            </div>
        </template>
    </div>
    <script src="assets/js/Popup.js"></script>
    <script src="assets/js/formHandler.js"></script>
</body>

</html>