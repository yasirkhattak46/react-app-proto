<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css']); ?>
</head>
<body class="antialiased">
<div class="container" id="app"></div>
<?php echo app('Illuminate\Foundation\Vite')->reactRefresh(); ?>
<?php echo app('Illuminate\Foundation\Vite')(['resources/js/app.jsx']); ?>

</body>
</html>
<?php /**PATH D:\wamp64\www\youtube_extension_app\resources\views/welcome.blade.php ENDPATH**/ ?>