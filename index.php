<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mailing tool</title>
    <link rel="stylesheet" href="assets/css/default.css">
    <link rel="stylesheet" href="assets/css/popup.css">
</head>

<body>
    <div class="card">
        <header>
            <h1>📧 Mailing tool</h1>
        </header>
        <form action="mail.php" method="POST" name="mail" autocomplete="off">
            <select name="sender">
                <option disabled selected hidden>-- Wybierz nadawcę --</option>
                <?php foreach ([] as $account) { ?>
                    <option value="<?= $account['user'] ?>">
                        <?= $account['label'] ?>&lt;<?= $account['user'] ?>&gt;
                    </option>
                <?php } ?>
            </select>
            <input type="text" name="recipient" placeholder="Adresat">
            <input type="text" name="subject" placeholder="Temat">
            <div contenteditable name="body" role="textbox"></div>
            <!-- <textarea name="body" placeholder="Treść"></textarea> -->
            <div class="upload-container">
                <template id="file">
                    <div class="file">
                        <span class="remove">&#x2716;</span>
                        <input type="file" name="attachments[]">
                    </div>
                </template>
            </div>
            <div>
                <label class="upload-button">
                    🔗<input type="file" multiple onchange="handleFiles(this)">
                </label>
                <button type="submit">Wyślij</button>
            </div>
        </form>
    </div>
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
    <script src="assets/js/payloadHandler.js"></script>
    <script src="assets/js/popup.js"></script>
    <script src="assets/js/attachmentManager.js"></script>
</body>

</html>