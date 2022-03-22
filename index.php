<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        body {
            background-color: #eee;
            font-family: sans-serif;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            max-width: 400px;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: stretch;
            gap: 0.5rem;
        }

        form input,
        form textarea,
        form select {
            width: 100%;
        }
    </style>
</head>

<body>
    <form action="mail.php" method="POST">
        <div>
            <label for="">Od</label>
            <select name="" id="">
                <option value="">-- Wybierz nadawcę --</option>
                <!-- <option value=""></option> -->
                <!-- <option value=""></option> -->
            </select>
        </div>
        <div>
            <label for="recipient">Do</label>
            <input type="text" name="recipient" id="recipient">
        </div>
        <div>
            <label for="subject">Temat</label>
            <input type="text" name="subject" id="subject">
        </div>
        <div>
            <label for="content">Treść</label>
            <textarea name="content" id="content"></textarea>
        </div>
        <input type="submit">
    </form>
</body>

</html>