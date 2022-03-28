<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mailing tool</title>
    <link rel="stylesheet" href="assets/css/default.css">
</head>

<body>
    <div class="card">
        <header>
            <h1>Mailing tool</h1>
        </header>
        <form action="mail.php" method="POST" name="mail" autocomplete="off">
            <!-- <div>
                <label for="sender">Od</label>
                <select name="sender" id="sender">
                    <option selected disabled hidden>-- Wybierz nadawcę --</option>
                </select>
            </div> -->
            <div>
                <label for="recipient">Do</label>
                <input type="text" name="recipient" id="recipient">
            </div>
            <div>
                <label for="subject">Temat</label>
                <input type="text" name="subject" id="subject">
            </div>
            <div>
                <label for="body">Treść</label>
                <textarea name="body" id="body"></textarea>
            </div>
            <input type="file" name="attachments[]" multiple>
            <button type="submit">Wyślij</button>
        </form>
    </div>
    <div class="popup__container">
        <template id="popup">
            <div class="popup">
                <div class="popup__content">
                    <img src="assets/img/check.png" alt="checkmark">
                    <h4></h4>
                    <ul>
                        <li></li>
                    </ul>
                </div>
                <hr>
            </div>
        </template>
    </div>
    <script src="assets/js/payloadHandler.js"></script>
</body>

</html>