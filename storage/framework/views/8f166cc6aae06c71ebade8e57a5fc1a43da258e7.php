 <?php $request = app('Illuminate\Http\Request'); ?>

<?php $__env->startSection('title', trans('backend/global.user-management.title')); ?>
<?php $__env->startSection('page-title', trans('backend/global.user-management.title')); ?>

<?php $__env->startSection('content'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?> 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>