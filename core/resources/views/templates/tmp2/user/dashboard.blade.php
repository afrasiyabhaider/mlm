@extends(activeTemplate() .'layouts.app')

@section('content')

<style>
.alert {
  padding: 20px;
  background-color: #de561f;
  color: white;
}
.alert1 {
  padding: 20px;
  background-color: #1f920a;
  color: white;
}
.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

.closebtn:hover {
  color: black;
}
</style>
  @if(auth()->user()->plan_id == 0)
<div class="alert">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
  <strong>Congratulations For Signing up!</strong><hr> Deposit your $50 to Buy your Membership Slot and get activated.  <a href="referrals"  class="btn btn-sm btn-neutral">See Referrals Details Here</a> 
</div>
@endif

 @if(auth()->user()->plan_id = 1)
<div class="alert1">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
  <strong>Yeah! You Did it!</strong><hr> You have Just activate the 50dollar Plan. The Next Task is to refer 3 people. <a href="referrals"  class="btn btn-sm btn-neutral">Click Here To See Referral Details</a> 
</div>
    @endif
    

    <div class="row">
        <div class="col-xl-4 col-lg-6 col-sm-6">
            <div class="dashboard-w2 slice border-radius-5"  data-bg="2ecc71" data-before="27ae60"
                 style="background: #2ecc71; --before-bg-color:#27ae60;">
                <div class="details">
                    <h2 class="amount mb-2 font-weight-bold">{{$general->cur_sym}}{{formatter_money(Auth::user()->balance)}} </h2>
                    <h4 class="mb-3">@lang('Current Balance')</h4>
                    <a href="{{route('user.deposit.history')}}" class="btn btn-sm btn-neutral">@lang('View all')</a>
                </div>
                <div class="icon">
                    <i class="fa fa-money"></i>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-6 col-sm-6">
            <div class="dashboard-w2 slice bg-primary border-radius-5">
                <div class="details">
                    <h2 class="amount mb-2 font-weight-bold">{{$general->cur_sym}}{{formatter_money($total_deposit)}} </h2>
                    <h4 class="mb-3">@lang('Total Deposit')</h4>
                    <a href="{{route('user.deposit.history')}}" class="btn btn-sm btn-neutral">@lang('View all')</a>
                </div>
                <div class="icon">
                    <i class="fa fa-money"></i>
                </div>
            </div>
        </div>


        <div class="col-xl-4 col-lg-6 col-sm-6">
            <div class="dashboard-w2 slice bg-info border-radius-5">
                <div class="details">
                    <h2 class="amount mb-2 font-weight-bold">{{$general->cur_sym}}{{formatter_money($total_withdraw)}} </h2>
                    <h4 class="mb-3">@lang('Total Withdraw')</h4>
                    <a href="{{route('user.withdraw')}}" class="btn btn-sm btn-neutral">@lang('View all')</a>
                </div>
                <div class="icon">
                    <i class="fa fa-money"></i>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-6 col-sm-6">
            <div class="dashboard-w2 slice bg-warning border-radius-5">
                <div class="details">
                    <h2 class="amount mb-2 font-weight-bold">{{$general->cur_sym}}{{formatter_money($ref_com)}}</h2>
                    <h4 class="mb-3">@lang('Total Referral Commission')</h4>
                    <a href="{{route('user.level.com')}}" class="btn btn-sm btn-neutral">@lang('View all')</a>
                </div>
                <div class="icon">
                    <i class="fa fa-money"></i>
                </div>
            </div>
        </div>


        <div class="col-xl-4 col-lg-6 col-sm-6">
            <div class="dashboard-w2 slice bg-info border-radius-5">
                <div class="details">
                    <h2 class="amount mb-2 font-weight-bold">{{$general->cur_sym}}{{formatter_money($level_com)}}</h2>
                    <h4 class="mb-3">@lang('Total Level Commission')</h4>
                    <a href="{{route('user.level.com')}}" class="btn btn-sm btn-neutral">@lang('View all')</a>
                </div>
                <div class="icon">
                    <i class="fa fa-money"></i>
                </div>
            </div>
        </div>


        <div class="col-xl-4 col-lg-6 col-sm-6">
            <div class="dashboard-w2 slice bg-dark border-radius-5">
                <div class="details">
                    <h2 class="amount mb-2 font-weight-bold">{{$general->cur_sym}}{{formatter_money($total_epin_recharge)}}</h2>
                    <h4 class="mb-3">@lang('Total E-Pin Recharged')</h4>
                    <a href="{{route('user.e_pin.recharge')}}" class="btn btn-sm btn-neutral">@lang('View all')</a>
                </div>
                <div class="icon">
                    <i class="fa fa-cart-plus"></i>
                </div>
            </div>
        </div>


        <div class="col-xl-4 col-lg-6 col-sm-6">
            <div class="dashboard-w2 slice bg-default border-radius-5">
                <div class="details">
                    <h2 class="amount mb-2 font-weight-bold">{{$general->cur_sym}}{{formatter_money($total_epin_generate)}}</h2>
                    <h4 class="mb-3">@lang('Total E-Pin Generated')</h4>
                    <a href="{{route('user.e_pin.generated')}}" class="btn btn-sm btn-neutral">@lang('View all')</a>
                </div>
                <div class="icon">
                    <i class="fa fa-plus-circle"></i>
                </div>
            </div>
        </div>



        <div class="col-xl-4 col-lg-6 col-sm-6">
            <div class="dashboard-w2 slice bg-blue border-radius-5">
                <div class="details">
                    <h2 class="amount mb-2 font-weight-bold">{{$general->cur_sym}}{{formatter_money($total_bal_transfer)}}</h2>
                    <h4 class="mb-3">@lang('Total Transferred Balance')</h4>
                    <a href="{{route('user.balance.tf.log')}}" class="btn btn-sm btn-neutral">@lang('View all')</a>
                </div>
                <div class="icon">
                    <i class="fa fa-random"></i>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-sm-6">
            <div class="dashboard-w2 slice bg-red border-radius-5">
                <div class="details">
                    <h2 class="amount mb-2 font-weight-bold">{{$total_direct_ref}}</h2>
                    <h4 class="mb-3">@lang('Total My Direct Referral')</h4>
                    <a href="{{route('user.ref.index')}}" class="btn btn-sm btn-neutral">@lang('View all')</a>
                </div>
                <div class="icon">
                    <i class="fa fa-sitemap"></i>
                </div>
            </div>
        </div>
    </div>


@endsection
