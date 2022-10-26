<form action="/tasks/update/<?php echo e($data->id); ?>" method="post">
    <?php echo csrf_field(); ?>
    <input type="text" name="name" value="<?php echo e($data->name); ?>">
    <button type="submit">UPDATE</button>
</form><?php /**PATH C:\Users\mrjol\OneDrive\Escritorio\clase2laravel\resources\views/show.blade.php ENDPATH**/ ?>