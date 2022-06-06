

<html>
<head>
    <link rel="stylesheet" href="./css/register.css">
    <script src="./js/register.js" defer></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noticia+Text&display=swap" rel="stylesheet">
</head>
<body>
    <section>
        <img id="logo" src="./image/logo.png">
            <form id="register_form" method="post">
                @csrf
                <div class="row_form">
                    <label for="username">Username</label>
                    <input id="username" name=username type="text">
                </div>
                <div class="row_form">
                    <label for="pwd">Password</label>
                    <input id ="pwd" name=pwd type="password">
                </div>
                <div class="row_form">
                    <input id="check" name="check" type="checkbox" checked>
                    <label for="check">Acconsento il trattamento dei dati</label>
                </div>
                <div class="row_form">
                    <button >REGISTRA</button>
                </div>
            </form>
    </section>
</body>
</html>
