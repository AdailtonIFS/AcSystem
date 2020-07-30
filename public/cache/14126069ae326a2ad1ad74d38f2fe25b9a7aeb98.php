<?php $__env->startSection('content'); ?>
        <h1>My first section</h1>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template/default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>