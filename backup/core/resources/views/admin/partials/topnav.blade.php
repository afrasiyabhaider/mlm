<div class="navbar-menu-wrapper d-flex flex-row align-items-center bg-primary">
    <button class="navbar-toggler" type="button"> <i class="fa fa-ellipsis-v"></i></button>
    <div class="navbar-search ml-lg-4">
        <form class="navbar-search-form" onsubmit="return false;">
        <div class="input-group align-items-center">
            <div class="search-icon"><span class="fa fa-search"></span></div>
            <input type="search" name="navbar_search" id="navbar_search" placeholder="Search any settings" autocomplete="off">
        </div>
        <div id="navbar_search_result_area">
            <ul class="navbar_search_result"></ul>
        </div>
        </form>
    </div>

    <ul class="navbar-nav ml-auto flex-row">
        <li class="nav-item dropdown">
            <a class="nav-link pt-1 pl-1" href="#" id="userProfileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-bell" style="font-size: 30px"></i>
                <span id="count_notif"  style="position: absolute;"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userProfileDropdown">
                <h4 class="ml-2">Notifications</h4>
                <hr>
                <table class="table-borderless table" id="notification"></table>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link" href="#" id="userProfileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="{{ get_image(config('constants.admin.profile.path') .'/'. auth()->guard('admin')->user()->image) }}" alt="user-image">
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userProfileDropdown">
                <a class="dropdown-item" href="{{ route('admin.profile') }}"><i class="fa fa-user"></i> Profile</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('admin.logout') }}"><i class="fa fa-sign-out"></i>Logout</a>
            </div>
        </li>
    </ul>
</div>
@push('script')
    <script>
        function markAsRead(e) {
            var id = $(e).attr('id');
            // console.log(id);
            $.ajax({
                url: '{!! url("read/notification/'+id+'") !!}',
                method: 'GET',
                dataType: 'json',
                success: function () {
                    getNotification();
                },
                error: function () {
                    getNotification();
                }
            });
        }
        var interval = null;
        $(function () {
            getNotification();
            interval =setInterval(getNotification,5000);
        });
        function getNotification() {
            $.ajax({
                url: '{!! url("notifications") !!}',
                method: 'GET',
                dataType: 'json',
                success: function (res) {
                    showNotifications(res);
                },
                error: function (res) {
                    $("#count_notif").empty();
                    $("#count_notif").append('<span class="badge badge-pill badge-success">0</span>');
                    // clearInterval(interval);
                },
            });
        }
        function showNotifications(data) {
            if (data.length) {
                $("#notification").empty();
                $("#count_notif").empty();
                $("#count_notif").append('<span class="badge badge-pill badge-danger">'+data.length+'</span>');
                var result = '';
                for (let i = 0; i < data.length; i++) {
                    result += '<tr> <td><span class="dropdown-item"><i class="fa fa-bullseye"></i>'+data[i].data.message+' - '+new Date(data[i].created_at).toLocaleString('de-DE')+'</td> <td><button id="'+data[i].id+'" onclick="markAsRead(this);" class="btn btn-sm btn-success"><i class="fa fa-check"></i></button></span></td></tr>';
                }
                $("#notification").append(result);
            }
        }
    </script>
@endpush
