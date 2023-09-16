<nav class="top-menu">
    <div class="menu-icon-container hidden-md-up">
        <div class="animate-menu-button left-menu-toggle">
            <div><!-- --></div>
        </div>
    </div>
    <div class="menu">
        <div class="menu-user-block">
            <div class="dropdown dropdown-avatar">
                <a href="javascript: void(0);" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <span class="avatar" href="javascript:void(0);">
                        <img src="/" alt="Alternative text to the image">
                    </span>
                </a>
                <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="" role="menu">
                    <a class="dropdown-item" href="#logout" onclick="$('#logout').submit();"><i class="dropdown-icon icmn-exit"></i> <?php echo app('translator')->getFromJson('backend/global.app_logout'); ?></a>
					<?php echo Form::open(['route' => 'auth.logout', 'style' => 'display:none;', 'id' => 'logout']); ?>

					<button type="submit"><?php echo app('translator')->getFromJson('global.logout'); ?></button>
					<?php echo Form::close(); ?>

                </ul>
            </div>
        </div>
    </div>
</nav>