<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <link rel="icon" href="img/icon.png">

    <link rel="stylesheet" href="<?= BASEURL ?>/css/style-login.css">

</head>

<body>
    <div class="center">
        <h1>Login</h1>
        <?php if (isset($error)) : ?>
            <p class="salah">username atau password salah</p>
        <?php endif; ?>
        <form action="<?= BASEURL ?>Log/login" method="post">
            <input type="hidden" name="id" value="<?= $data['login']; ?>">
            <div class="txt_field">
                <input type="text" name="username" id="username" required>
                <label for="username">Username</label>
            </div>
            <div class="txt_field">
                <input type="password" name="password" id="password" required>
                <label for="password">Password</label>
            </div>
            <div class="login-button" style="margin: 50px auto;">
                <button type="submit" name="login" class="button">Login</button>
            </div>
        </form>
    </div>
</body>

</html>