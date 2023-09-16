<?php $request = app('Illuminate\Http\Request'); ?>

<?php $__env->startSection('title', trans('backend/global.roles.title')); ?>
<?php $__env->startSection('page-title', trans('backend/global.user-management.title')); ?>
<?php $__env->startSection('content'); ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="page-title"><?php echo app('translator')->getFromJson('backend/global.roles.title'); ?></h3>
			<a href="<?php echo e(route('backend.roles.create')); ?>" class="btn btn-success"><?php echo app('translator')->getFromJson('backend/global.app_add_new'); ?></a>
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped <?php echo e(count($roles) > 0 ? 'datatable' : ''); ?> dt-select">
                <thead>
                    <tr>
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        <th><?php echo app('translator')->getFromJson('backend/global.roles.fields.name'); ?></th>
                        <th><?php echo app('translator')->getFromJson('backend/global.roles.fields.permission'); ?></th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    <?php if(count($roles) > 0): ?>
                        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr data-entry-id="<?php echo e($role->id); ?>">
                                <td></td>
                                <td><?php echo e($role->name); ?></td>
                                <td>
                                    <?php $__currentLoopData = $role->permissions()->pluck('name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <span class="label label-info label-many"><?php echo e($permission); ?></span>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </td>
                                <td>
                                    <a href="<?php echo e(route('backend.roles.edit',[$role->id])); ?>" class="btn btn-xs btn-info"><?php echo app('translator')->getFromJson('backend/global.app_edit'); ?></a>
                                    <?php echo Form::open(array(
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("backend/global.app_are_you_sure")."');",
                                        'route' => ['backend.roles.destroy', $role->id])); ?>

                                    <?php echo Form::submit(trans('backend/global.app_delete'), array('class' => 'btn btn-xs btn-danger')); ?>

                                    <?php echo Form::close(); ?>

                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6"><?php echo app('translator')->getFromJson('backend/global.app_no_entries_in_table'); ?></td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>