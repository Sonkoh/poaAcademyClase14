<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>
    <?php if(session('success')): ?>
    <div class="alert alert-success container">
        <?php echo e(session('message')); ?>

    </div>
    <?php endif; ?>
    <form class="m-auto container">
        <?php echo csrf_field(); ?>
        <input type="text" id="name" class="form-control" placeholder="Nombre">
        <button type="submit" class="form-control">Crear Tarea</button>
    </form>
    <table class="table container">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <th scope="row"><?php echo e($task->id); ?></th>
                <td><a href="/tasks/select/<?php echo e($task->id); ?>""><?php echo e($task->name); ?></a></td>
                <td><a href=" /tasks/delete/<?php echo e($task->id); ?>"><i class="bi bi-trash-fill"></i></a></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <script>
        $('form').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "post",
                url: "/tasks/create",
                data: {
                    name: $('#name').val(),
                    "_token": "<?php echo e(csrf_token()); ?>"
                },
                success: function(response) {
                    $('tbody').html('');
                    for (task of response.data) {
                        $('tbody').append(`<tr>
                <th scope="row">${task.id}</th>
                <td><a href="/tasks/select/${task.id}"">${task.name}</a></td>
                <td><a href="/tasks/delete/${task.id}"><i class="bi bi-trash-fill"></i></a></td>
            </tr>`);
            $('#name').val('')
                    }
                }
            });
        });
    </script>
</body>

</html><?php /**PATH C:\Users\mrjol\OneDrive\Escritorio\clase2laravel\resources\views/index.blade.php ENDPATH**/ ?>