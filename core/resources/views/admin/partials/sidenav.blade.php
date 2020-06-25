<nav class="main-sidebar bg-default">
    <button class="sidebar-close"><i class="fa fa-times"></i></button>
    <div class="navbar-brand-wrapper d-flex justify-content-start align-items-center">
        <a href="{{ route('admin.dashboard') }}" class="navbar-brand">
            <span class="logo-one"><img src="{{ get_image(config('constants.logoIcon.path') .'/logo.png') }}" alt="logo-image" /></span>
            <span class="logo-two"><img src="{{ get_image(config('constants.logoIcon.path') .'/favicon.png') }}" alt="logo-image" /></span>
        </a>
    </div>
    <div id="main-sidebar">
        <ul class="nav">

            <li class="nav-item {{ sidenav_active('admin.dashboard') }}">
                <a href="{{ route('admin.dashboard') }}" class="nav-link">
                    <span class="menu-icon"><i class="fa fa-th-large text-facebook"></i></span>
                    <span class="menu-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item {{ sidenav_active('admin.plan*') }}">
                <a href="{{ route('admin.plan.index') }}" class="nav-link">
                    <span class="menu-icon"><i class="fa fa-lightbulb-o text-facebook"></i></span>
                    <span class="menu-title">Plan</span>
                </a>
            </li>




            <li class="nav-item {{ sidenav_active('admin.manage-pin') }}{{ sidenav_active('admin.used-pin') }}">
                <a data-default-url="{{ route('admin.report.transaction') }}" class="nav-link">
                    <span class="menu-icon"><i class="fa fa-clipboard text-facebook"></i></span>
                    <span class="menu-title">Manage-pin</span>
                    <span class="menu-arrow"><i class="fa fa-chevron-right"></i></span>
                </a>

                <ul class="sub-menu">
                    <li class="nav-item {{ sidenav_active('admin.manage-pin') }}">
                        <a class="nav-link" href="{{ route('admin.manage-pin') }}">
                            <span class="mr-2"><i class="fa fa-angle-right"></i></span>
                            <span class="menu-title">Generate E-PIN</span>
                        </a>
                    </li>
                    <li class="nav-item {{ sidenav_active('admin.used-pin') }}">
                        <a class="nav-link" href="{{ route('admin.used-pin') }}">
                            <span class="mr-2"><i class="fa fa-angle-right"></i></span>
                            <span class="menu-title">Used E-PIN</span>
                        </a>
                    </li>
                </ul>
            </li>







            <li class="nav-item {{ sidenav_active('admin.users*') }}">
                <a data-default-url="{{ route('admin.users.all') }}" class="nav-link">
                    <span class="menu-icon"><i class="fa fa-users text-facebook"></i></span>
                    <span class="menu-title">Manage Users</span>
                    @if($email_unverified_users_count > 0 || $sms_unverified_users_count > 0)
                        <span class="badge bg-orange border-radius-10"><i class="fa px-1 fa-exclamation"></i></span>
                    @endif
                    <span class="menu-arrow"><i class="fa fa-chevron-right"></i></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item {{ sidenav_active('admin.users.all') }}">
                        <a class="nav-link" href="{{ route('admin.users.all') }}">
                            <span class="mr-2"><i class="fa fa-angle-right"></i></span>
                            <span class="menu-title">All Users</span>
                        </a>
                    </li>
                    <li class="nav-item {{ sidenav_active('admin.users.active') }}">
                        <a class="nav-link" href="{{ route('admin.users.active') }}">
                            <span class="mr-2"><i class="fa fa-angle-right"></i></span>
                            <span class="menu-title">Active Users</span>
                        </a>
                    </li>
                    <li class="nav-item {{ sidenav_active('admin.users.banned') }}">
                        <a class="nav-link" href="{{ route('admin.users.banned') }}">
                            <span class="mr-2"><i class="fa fa-angle-right"></i></span>
                            <span class="menu-title">Banned Users</span>
                            @if($banned_users_count) <span class="badge bg-blue border-radius-10">{{ $banned_users_count }}</span> @endif
                        </a>
                    </li>
                    <li class="nav-item {{ sidenav_active('admin.users.emailUnverified') }}">
                        <a class="nav-link" href="{{ route('admin.users.emailUnverified') }}">
                            <span class="mr-2"><i class="fa fa-angle-right"></i></span>
                            <span class="menu-title">Email Unverified</span>
                            @if($email_unverified_users_count) <span class="badge bg-blue border-radius-10">{{ $email_unverified_users_count }}</span> @endif
                        </a>
                    </li>
                    <li class="nav-item {{ sidenav_active('admin.users.smsUnverified') }}">
                        <a class="nav-link" href="{{ route('admin.users.smsUnverified') }}">
                            <span class="mr-2"><i class="fa fa-angle-right"></i></span>
                            <span class="menu-title">SMS Unverified</span>
                            @if($sms_unverified_users_count) <span class="badge bg-blue border-radius-10">{{ $sms_unverified_users_count }}</span> @endif
                        </a>
                    </li>

                    <li class="nav-item {{ sidenav_active(['admin.users.login.history','admin.users.login.search']) }}">
                        <a class="nav-link" href="{{ route('admin.users.login.history') }}">
                            <span class="mr-2"><i class="fa fa-angle-right"></i></span>
                            <span class="menu-title">Login History</span>
                        </a>
                    </li>
                    <li class="nav-item {{ sidenav_active('admin.users.email.all') }}">
                        <a class="nav-link" href="{{ route('admin.users.email.all') }}">
                            <span class="mr-2"><i class="fa fa-angle-right"></i></span>
                            <span class="menu-title">Send Email</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item {{ sidenav_active('admin.withdraw*') }}">
                <a data-default-url="{{ route('admin.withdraw.method.methods') }}" class="nav-link">
                    <span class="menu-icon"><i class="fa fa-bank text-facebook"></i></span>
                    <span class="menu-title">Withdraw System</span>
                    @if($pending_withdrawals_count > 0)
                        <span class="badge bg-orange border-radius-10"><i class="fa px-1 fa-exclamation"></i></span>
                    @endif
                    <span class="menu-arrow"><i class="fa fa-chevron-right"></i></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item {{ sidenav_active('admin.withdraw.method*') }}">
                        <a class="nav-link" href="{{ route('admin.withdraw.method.methods') }}">
                            <span class="mr-2"><i class="fa fa-angle-right"></i></span>
                            <span class="menu-title">Withdraw Methods</span>
                        </a>
                    </li>
                    <li class="nav-item {{ sidenav_active('admin.withdraw.pending') }}">
                        <a class="nav-link" href="{{ route('admin.withdraw.pending') }}">
                            <span class="mr-2"><i class="fa fa-angle-right"></i></span>
                            <span class="menu-title">Pending Withdrawals</span>
                            @if($pending_withdrawals_count) <span class="badge bg-blue border-radius-10">{{ $pending_withdrawals_count }}</span> @endif
                        </a>
                    </li>
                    <li class="nav-item {{ sidenav_active('admin.withdraw.approved') }}">
                        <a class="nav-link" href="{{ route('admin.withdraw.approved') }}">
                            <span class="mr-2"><i class="fa fa-angle-right"></i></span>
                            <span class="menu-title">Approved Withdrawals</span>
                        </a>
                    </li>
                    <li class="nav-item {{ sidenav_active('admin.withdraw.rejected') }}">
                        <a class="nav-link" href="{{ route('admin.withdraw.rejected') }}">
                            <span class="mr-2"><i class="fa fa-angle-right"></i></span>
                            <span class="menu-title">Rejected Withdrawals</span>
                        </a>
                    </li>
                    <li class="nav-item {{ sidenav_active('admin.withdraw.log') }}">
                        <a class="nav-link" href="{{ route('admin.withdraw.log') }}">
                            <span class="mr-2"><i class="fa fa-angle-right"></i></span>
                            <span class="menu-title">All Withdrawals</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item {{ sidenav_active('admin.deposit*') }}">
                <a data-default-url="{{ route('admin.deposit.gateway.index') }}" class="nav-link">
                    <span class="menu-icon"><i class="fa fa-credit-card-alt text-facebook"></i></span>
                    <span class="menu-title">Deposit System</span>
                    <span class="menu-arrow"><i class="fa fa-chevron-right"></i></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item {{ sidenav_active('admin.deposit.gateway*') }}">
                        <a class="nav-link" href="{{ route('admin.deposit.gateway.index') }}">
                            <span class="mr-2"><i class="fa fa-angle-right"></i></span>
                            <span class="menu-title">Automatic Gateways</span>
                        </a>
                    </li>
                    <li class="nav-item {{ sidenav_active('admin.deposit.manual*') }}">
                        <a class="nav-link" href="{{ route('admin.deposit.manual.index') }}">
                            <span class="mr-2"><i class="fa fa-angle-right"></i></span>
                            <span class="menu-title">Manual Methods</span>
                        </a>
                    </li>
                    <li class="nav-item {{ sidenav_active('admin.deposit.pending') }}">
                        <a class="nav-link" href="{{ route('admin.deposit.pending') }}">
                            <span class="mr-2"><i class="fa fa-angle-right"></i></span>
                            <span class="menu-title">Pending Deposits</span>
                        </a>
                    </li>
                    <li class="nav-item {{ sidenav_active('admin.deposit.approved') }}">
                        <a class="nav-link" href="{{ route('admin.deposit.approved') }}">
                            <span class="mr-2"><i class="fa fa-angle-right"></i></span>
                            <span class="menu-title">Approved Deposits</span>
                        </a>
                    </li>
                    <li class="nav-item {{ sidenav_active('admin.deposit.rejected') }}">
                        <a class="nav-link" href="{{ route('admin.deposit.rejected') }}">
                            <span class="mr-2"><i class="fa fa-angle-right"></i></span>
                            <span class="menu-title">Rejected Deposits</span>
                        </a>
                    </li>
                    <li class="nav-item {{ sidenav_active('admin.deposit.list') }}">
                        <a class="nav-link" href="{{ route('admin.deposit.list') }}">
                            <span class="mr-2"><i class="fa fa-angle-right"></i></span>
                            <span class="menu-title">All Deposits</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item {{ sidenav_active('admin.supportTicket*') }}">
                <a href="{{ route('admin.supportTicket.index') }}" class="nav-link">
                    <span class="menu-icon"><i class="fa fa-ticket text-facebook"></i></span>
                    <span class="menu-title">Support Ticket</span>
                </a>
            </li>

            <li class="nav-item {{ sidenav_active('admin.subscriber*') }}">
                <a href="{{ route('admin.subscriber.index') }}" class="nav-link">
                    <span class="menu-icon"><i class="fa fa-rss-square text-facebook"></i></span>
                    <span class="menu-title">Subscribers</span>
                </a>
            </li>

            <li class="nav-item {{ sidenav_active('admin.report*') }}">
                <a data-default-url="{{ route('admin.report.transaction') }}" class="nav-link">
                    <span class="menu-icon"><i class="fa fa-clipboard text-facebook"></i></span>
                    <span class="menu-title">Reports</span>
                    <span class="menu-arrow"><i class="fa fa-chevron-right"></i></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item {{ sidenav_active('admin.report.transaction*') }}">
                        <a class="nav-link" href="{{ route('admin.report.transaction') }}">
                            <span class="mr-2"><i class="fa fa-angle-right"></i></span>
                            <span class="menu-title">Transaction Log</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
        <hr class="nk-hr" />
        <h6 class="nav-header text-facebook">Settings</h6>
        <ul class="nav">

            <li class="nav-item {{ sidenav_active('admin.plugin*') }}">
                <a href="{{ route('admin.plugin.index') }}" class="nav-link">
                    <span class="menu-icon"><i class="fa fa-cogs text-facebook"></i></span>
                    <span class="menu-title">Plugin & Extensions</span>
                </a>
            </li>

            <li class="nav-item {{ sidenav_active('admin.frontend*') }}">
                <a data-default-url="{{ route('admin.frontend.blog.index') }}" class="nav-link">
                    <span class="menu-icon"><i class="fa fa-diamond text-facebook"></i></span>
                    <span class="menu-title">Frontend Manager</span>
                    <span class="menu-arrow"><i class="fa fa-chevron-right"></i></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item {{ sidenav_active('admin.frontend.banner*') }}">
                        <a class="nav-link" href="{{ route('admin.frontend.banner.index') }}">
                            <span class="mr-2"><i class="fa fa-angle-right"></i></span>
                            <span class="menu-title">Banner/Slider</span>
                        </a>
                    </li>

                    <li class="nav-item {{ sidenav_active('admin.frontend.about*') }}">
                        <a class="nav-link" href="{{ route('admin.frontend.about.index') }}">
                            <span class="mr-2"><i class="fa fa-angle-right"></i></span>
                            <span class="menu-title">About</span>
                        </a>
                    </li>

                    <li class="nav-item {{ sidenav_active('admin.frontend.howWork*') }}">
                        <a class="nav-link" href="{{ route('admin.frontend.howWork.index') }}">
                            <span class="mr-2"><i class="fa fa-angle-right"></i></span>
                            <span class="menu-title">How it Works</span>
                        </a>
                    </li>
                    <li class="nav-item {{ sidenav_active('admin.frontend.plan*') }}">
                        <a class="nav-link" href="{{ route('admin.frontend.plan.index') }}">
                            <span class="mr-2"><i class="fa fa-angle-right"></i></span>
                            <span class="menu-title">Plan Section</span>
                        </a>
                    </li>
                    <li class="nav-item {{ sidenav_active('admin.frontend.service*') }}">
                        <a class="nav-link" href="{{ route('admin.frontend.service.index') }}">
                            <span class="mr-2"><i class="fa fa-angle-right"></i></span>
                            <span class="menu-title">Services</span>
                        </a>
                    </li>
                    <li class="nav-item {{ sidenav_active('admin.frontend.testimonial*') }}">
                        <a class="nav-link" href="{{ route('admin.frontend.testimonial.index') }}">
                            <span class="mr-2"><i class="fa fa-angle-right"></i></span>
                            <span class="menu-title">Testimonial</span>
                        </a>
                    </li>

                    <li class="nav-item {{ sidenav_active('admin.frontend.video*') }}">
                        <a class="nav-link" href="{{ route('admin.frontend.video.index') }}">
                            <span class="mr-2"><i class="fa fa-angle-right"></i></span>
                            <span class="menu-title">Video Section</span>
                        </a>
                    </li>

                    <li class="nav-item {{ sidenav_active('admin.frontend.blog*') }}">
                        <a class="nav-link" href="{{ route('admin.frontend.blog.index') }}">
                            <span class="mr-2"><i class="fa fa-angle-right"></i></span>
                            <span class="menu-title">Blog Manager</span>
                        </a>
                    </li>
                    <li class="nav-item {{ sidenav_active('admin.frontend.faq*') }}">
                        <a class="nav-link" href="{{ route('admin.frontend.faq.index') }}">
                            <span class="mr-2"><i class="fa fa-angle-right"></i></span>
                            <span class="menu-title">Faq Manager</span>
                        </a>
                    </li>


                    <li class="nav-item {{ sidenav_active('admin.frontend.social*') }}">
                        <a class="nav-link" href="{{ route('admin.frontend.social.index') }}">
                            <span class="mr-2"><i class="fa fa-angle-right"></i></span>
                            <span class="menu-title">Social Icons</span>
                        </a>
                    </li>




                    <li class="nav-item {{ sidenav_active('admin.frontend.footer*') }}">
                        <a class="nav-link" href="{{ route('admin.frontend.footer.index') }}">
                            <span class="mr-2"><i class="fa fa-angle-right"></i></span>
                            <span class="menu-title">Footer</span>
                        </a>
                    </li>


                    <li class="nav-item {{ sidenav_active('admin.frontend.seo*') }}">
                        <a class="nav-link" href="{{ route('admin.frontend.seo.edit') }}">
                            <span class="mr-2"><i class="fa fa-angle-right"></i></span>
                            <span class="menu-title">SEO Manager</span>
                        </a>
                    </li>


                </ul>
            </li>

            <li class="nav-item {{ sidenav_active('admin.setting*') }}">
                <a data-default-url="{{ route('admin.setting.index') }}" class="nav-link">
                    <span class="menu-icon"><i class="fa fa-cog text-facebook"></i></span>
                    <span class="menu-title">General Settings</span>
                    <span class="menu-arrow"><i class="fa fa-chevron-right"></i></span>
                </a>
                <ul class="sub-menu">

                    <li class="nav-item {{ sidenav_active('admin.setting.index') }}">
                        <a class="nav-link" href="{{ route('admin.setting.index') }}">
                            <span class="mr-2"><i class="fa fa-angle-right"></i></span>
                            <span class="menu-title">Basic</span>
                        </a>
                    </li>
                    <li class="nav-item {{ sidenav_active('admin.setting.contact') }}">
                        <a class="nav-link" href="{{ route('admin.setting.contact') }}">
                            <span class="mr-2"><i class="fa fa-angle-right"></i></span>
                            <span class="menu-title">Contact Settings</span>
                        </a>
                    </li>


                    <li class="nav-item {{ sidenav_active('admin.setting.logo-icon') }}">
                        <a class="nav-link" href="{{ route('admin.setting.logo-icon') }}">
                            <span class="mr-2"><i class="fa fa-angle-right"></i></span>
                            <span class="menu-title">Logo & Icons</span>
                        </a>
                    </li>
                    <li class="nav-item {{ sidenav_active('admin.setting.language*') }}">
                        <a class="nav-link" href="{{ route('admin.setting.language-manage') }}">
                            <span class="mr-2"><i class="fa fa-angle-right"></i></span>
                            <span class="menu-title">Language Manager</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item {{ sidenav_active('admin.email-template*') }}">
                <a data-default-url="{{ route('admin.email-template.global') }}" class="nav-link">
                    <span class="menu-icon"><i class="fa fa-envelope-o text-facebook"></i></span>
                    <span class="menu-title">Email Manager</span>
                    <span class="menu-arrow"><i class="fa fa-chevron-right"></i></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item {{ sidenav_active('admin.email-template.global') }}">
                        <a class="nav-link" href="{{ route('admin.email-template.global') }}">
                            <span class="mr-2"><i class="fa fa-angle-right"></i></span>
                            <span class="menu-title">Global Template</span>
                        </a>
                    </li>
                    <li class="nav-item {{ sidenav_active(['admin.email-template.index','admin.email-template.edit']) }}">
                        <a class="nav-link" href="{{ route('admin.email-template.index') }}">
                            <span class="mr-2"><i class="fa fa-angle-right"></i></span>
                            <span class="menu-title">Email Templates</span>
                        </a>
                    </li>
                    <li class="nav-item {{ sidenav_active('admin.email-template.setting') }}">
                        <a class="nav-link" href="{{ route('admin.email-template.setting') }}">
                            <span class="mr-2"><i class="fa fa-angle-right"></i></span>
                            <span class="menu-title">Email Configure</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item {{ sidenav_active('admin.sms-template*') }}">
                <a data-default-url="{{ route('admin.sms-template.global') }}" class="nav-link">
                    <span class="menu-icon"><i class="fa fa-mobile text-facebook"></i></span>
                    <span class="menu-title">SMS Manager</span>
                    <span class="menu-arrow"><i class="fa fa-chevron-right"></i></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item {{ sidenav_active('admin.sms-template.global') }}">
                        <a class="nav-link" href="{{ route('admin.sms-template.global') }}">
                            <span class="mr-2"><i class="fa fa-angle-right"></i></span>
                            <span class="menu-title">Global Template</span>
                        </a>
                    </li>
                    <li class="nav-item {{ sidenav_active(['admin.sms-template.index','admin.sms-template.edit']) }}">
                        <a class="nav-link" href="{{ route('admin.sms-template.index') }}">
                            <span class="mr-2"><i class="fa fa-angle-right"></i></span>
                            <span class="menu-title">SMS Templates</span>
                        </a>
                    </li>
                </ul>
            </li>

        </ul>
    </div>
</nav>
