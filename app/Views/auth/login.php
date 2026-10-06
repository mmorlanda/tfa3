<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

<h1>Login</h1>

<?php if (session()->getFlashdata('error')): ?>
    <p style="color:red;">
        <?= esc(session()->getFlashdata('error')) ?>
    </p>
<?php endif; ?>

<?php if (session()->getFlashdata('message')): ?>
    <p style="color:green;">
        <?= esc(session()->getFlashdata('message')) ?>
    </p>
<?php endif; ?>

<?php if (session()->getFlashdata('errors')): ?>
    <?php foreach (session()->getFlashdata('errors') as $error): ?>
        <p style="color:red;"><?= esc($error) ?></p>
    <?php endforeach; ?>
<?php endif; ?>

<form method="post" action="<?= site_url('login') ?>">
    <?= csrf_field() ?>

    <label>Email</label><br>
    <input
        type="email"
        name="email"
        value="<?= old('email') ?>"
    ><br><br>

    <label>Password</label><br>
    <input type="password" name="password"><br><br>

    <button type="submit">Login</button>
</form>

<br>

<a href="<?= site_url('/') ?>">Back to Home</a>

</body>
</html>