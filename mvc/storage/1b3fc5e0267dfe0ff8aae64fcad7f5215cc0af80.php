<table>
    <thead>
        <th>ID</th>
        <th>Name</th>
        <th>Address</th>
        <th>Join date</th>
        <th>Avatar</th>
        <th>Department</th>
        <th>Salary</th>
    </thead>
    <tbody>
        <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $em): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($em->id); ?></td>
            <td><?php echo e($em->name); ?></td>
            <td><?php echo e($em->address); ?></td>
            <td><?php echo e($em->join_date); ?></td>
            <td><?php echo e($em->avatar); ?></td>
            <td><?php echo e($em->department_id); ?></td>
            <td><?php echo e($em->salary); ?></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table><?php /**PATH /Library/WebServer/Documents/WE3013.1-php2/mvc/app/views/home/index.blade.php ENDPATH**/ ?>