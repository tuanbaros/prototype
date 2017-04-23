<!DOCTYPE html>
<html>
<head>
    <?php require_once 'app/view/partial/meta.php'; ?>
    <title>Home</title>
    <?php require_once 'app/view/partial/css.php'; ?>
</head>
<body>
    <!-- home view with data: $data -->
    <?php if (isset($_SESSION['token'])) { ?>
        <h3>Welcome, <?php echo $data['user']->get_name(); ?></h3>
        <form action="<?php echo Route::action('auth', 'logout'); ?>">
        <button type="submit">Logout</button>
    </form>
    <?php } ?>
    <?php require_once 'app/view/partial/js.php'; ?>
</body>
</html>
