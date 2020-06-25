<nav class="main-sidebar bg-default">
    <button class="sidebar-close"><i class="fa fa-times"></i></button>
    <div class="navbar-brand-wrapper d-flex justify-content-start align-items-center">
        <a href="<?php echo e(route('user.home')); ?>" class="navbar-brand">
            <span class="logo-one"><img src="<?php echo e(get_image(config('constants.logoIcon.path') .'/logo.png')); ?>"
                                        alt="logo-image"/></span>
            <span class="logo-two"><img src="<?php echo e(get_image(config('constants.logoIcon.path') .'/favicon.png')); ?>"
                                        alt="logo-image"/></span>
        </a>
    </div>
    <div id="main-sidebar">
        <ul class="nav">
            <li class="nav-item <?php echo e(sidenav_active('user.home')); ?>">
                <a href="<?php echo e(route('user.home')); ?>" class="nav-link">
                    <span class="menu-icon"><i class="fa fa-th-large text-facebook"></i></span>
                    <span class="menu-title"><?php echo app('translator')->get('Dashboard'); ?></span>
                </a>
            </li>
            <li class="nav-item <?php echo e(sidenav_active('user.deposit*')); ?>">
                <a href="#" class="nav-link">
                    <span class="menu-icon"><i class="fa fa-credit-card text-primary"></i></span>
                    <span class="menu-title"><?php echo app('translator')->get('Deposit'); ?></span>
                    <span class="menu-arrow"><i class="fa fa-chevron-right"></i></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item <?php echo e(sidenav_active('user.deposit')); ?>">
                        <a class="nav-link" href="<?php echo e(route('user.deposit')); ?>">
                            <span class="mr-2"><i class="fa fa-angle-right"></i></span>
                            <span class="menu-title"><?php echo app('translator')->get('Deposit Now'); ?></span>
                        </a>
                    </li>
                    <li class="nav-item <?php echo e(sidenav_active('user.deposit.history')); ?>">
                        <a class="nav-link" href="<?php echo e(route('user.deposit.history')); ?>">
                            <span class="mr-2"><i class="fa fa-angle-right"></i></span>
                            <span class="menu-title"><?php echo app('translator')->get('Deposit History'); ?></span>
                        </a>
                    </li>
                </ul>
            </li>

            <?php if(auth()->user()->plan_id == 0): ?>

                <li class="nav-item <?php echo e(sidenav_active('user.plan.index')); ?>">
                    <a href="<?php echo e(route('user.plan.index')); ?>" class="nav-link">
                        <span class="menu-icon"><i class="fa fa-lightbulb-o text-facebook"></i></span>
                        <span class="menu-title"><?php echo app('translator')->get('Subscribe Plan'); ?></span>
                    </a>
                </li>

            <?php endif; ?>

            <li class="nav-item <?php echo e(sidenav_active('user.withdraw*')); ?>">
                <a href="#" class="nav-link">
                    <span class="menu-icon"><i class="fa fa-credit-card text-primary"></i></span>
                    <span class="menu-title"><?php echo app('translator')->get('Withdrawal'); ?></span>
                    <span class="menu-arrow"><i class="fa fa-chevron-right"></i></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item <?php echo e(sidenav_active('user.withdraw')); ?>">
                        <a class="nav-link" href="<?php echo e(route('user.withdraw')); ?>">
                            <span class="mr-2"><i class="fa fa-angle-right"></i></span>
                            <span class="menu-title"><?php echo app('translator')->get('Withdraw Now'); ?></span>
                        </a>
                    </li>
                    <li class="nav-item <?php echo e(sidenav_active('user.withdraw.history')); ?>">
                        <a class="nav-link" href="<?php echo e(route('user.withdraw.history')); ?>">
                            <span class="mr-2"><i class="fa fa-angle-right"></i></span>
                            <span class="menu-title"><?php echo app('translator')->get('Withdraw History'); ?></span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item <?php echo e(sidenav_active('user.pin.recharge')); ?>">
                <a href="<?php echo e(route('user.pin.recharge')); ?>" class="nav-link">
                    <span class="menu-icon"><i class="fa fa-credit-card text-facebook"></i></span>
                    <span class="menu-title"><?php echo app('translator')->get('E-Pin Recharge'); ?></span>
                </a>
            </li>
            <li class="nav-item <?php echo e(sidenav_active('user.balance.transfer')); ?>">
                <a href="<?php echo e(route('user.balance.transfer')); ?>" class="nav-link">
                    <span class="menu-icon"><i class="fa fa-exchange text-facebook"></i></span>
                    <span class="menu-title"><?php echo app('translator')->get('Transfer Balance'); ?></span>
                </a>
            </li>
            <li class="nav-item <?php echo e(sidenav_active('user.matrix*')); ?>">
                <a href="<?php echo e(route('user.matrix.index',['lv_no' => 1])); ?>" class="nav-link">
                    <span class="menu-icon"><i class="fa fa-sitemap text-facebook"></i></span>
                    <span class="menu-title"><?php echo app('translator')->get('My Matrix'); ?></span>
                </a>
            </li>
            <li class="nav-item <?php echo e(sidenav_active('user.ref.index')); ?>">
                <a href="<?php echo e(route('user.ref.index')); ?>" class="nav-link">
                    <span class="menu-icon"><i class="fa fa-users text-facebook"></i></span>
                    <span class="menu-title"><?php echo app('translator')->get('My Referral'); ?></span>
                </a>
            </li>
            <li class="nav-item <?php echo e(sidenav_active('user.transaction.index')); ?>">
                <a href="<?php echo e(route('user.transaction.index')); ?>" class="nav-link">
                    <span class="menu-icon"><i class="fa fa-money text-facebook"></i></span>
                    <span class="menu-title"><?php echo app('translator')->get('Transactions'); ?></span>
                </a>
            </li>
            <li class="nav-item <?php echo e(sidenav_active('user.go2fa')); ?>">
                <a href="<?php echo e(route('user.go2fa')); ?>" class="nav-link">
                    <span class="menu-icon"><i class="fa fa-shield text-facebook"></i></span>
                    <span class="menu-title"><?php echo app('translator')->get('2FA Security'); ?></span>
                </a>
            </li>

            <li class="nav-item <?php echo e(sidenav_active('user.ticket*')); ?>">
                <a href="<?php echo e(route('user.ticket')); ?>" class="nav-link">
                    <span class="menu-icon"><i class="fa fa-ticket text-facebook"></i></span>
                    <span class="menu-title"><?php echo app('translator')->get('Support'); ?></span>
                </a>
            </li>

            <li class="nav-item <?php echo e(sidenav_active('user.profile')); ?>">
                <a href="<?php echo e(route('user.profile')); ?>" class="nav-link">
                    <span class="menu-icon"><i class="fa fa-cog text-facebook"></i></span>
                    <span class="menu-title"><?php echo app('translator')->get('Account settings'); ?></span>
                </a>
            </li>
            <li class="nav-item <?php echo e(sidenav_active('user.login.history')); ?>">
                <a href="<?php echo e(route('user.login.history')); ?>" class="nav-link">
                    <span class="menu-icon"><i class="fa fa-history text-facebook"></i></span>
                    <span class="menu-title"><?php echo app('translator')->get('Login History'); ?></span>
                </a>
            </li>
        </ul>
    </div>
</nav>
<?php /**PATH G:\Wamps\wamp64\www\freelance\mlm\core\resources\views/templates/tmp2/partials/sidenav.blade.php ENDPATH**/ ?>