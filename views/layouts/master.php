<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="<?= asset('assets/master/img/icons/icon-48x48.png') ?>" />

    <title>Profile | Jatin</title>

    <link href="<?= asset('assets/master/css/app.css') ?>" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
    <div class="wrapper">

        <?php include dirname(__DIR__) . '/layouts/master_components/sidebar.php' ?>

        <div class="main">

            <?php include dirname(__DIR__) . '/layouts/master_components/header.php' ?>

            <main class="content p-3">{{CONTENT}}</main>

            <?php include dirname(__DIR__) . '/layouts/master_components/footer.php' ?>

        </div>
    </div>

    <script src="<?= asset('assets/master/js/app.js') ?>"></script>

</body>

</html>