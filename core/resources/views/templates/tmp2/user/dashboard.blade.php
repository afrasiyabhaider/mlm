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
        <div class="col-xl-3 col-lg-6 col-sm-6">
            <div class="dashboard-w2 slice border-radius-5"  data-bg="2ecc71" data-before="27ae60"
                 style="background: #2ecc71; --before-bg-color:#27ae60;">
                <div class="details">
                    <h2 class="amount mb-2 font-weight-bold">{{$general->cur_sym}}{{formatter_money(Auth::user()->balance)}} </h2>
                    <h5 class="mb-3">@lang('Total ') &nbsp;&nbsp;&nbsp; @lang('Balance')</h5>
                    <a href="{{route('user.deposit.history')}}" class="btn btn-sm btn-neutral">@lang('View all')</a>
                </div>
                <div class="icon">
                    <i class="fa fa-money"></i>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-6 col-sm-6">
            <div class="dashboard-w2 slice bg-primary border-radius-5">
                <div class="details">
                    <h2 class="amount mb-2 font-weight-bold">{{$general->cur_sym}}{{formatter_money($total_deposit)}} </h2>
                    <h5 class="mb-3">@lang('Total ') &nbsp;&nbsp;&nbsp; @lang('Deposit ')</h5>
                    <a href="{{route('user.deposit.history')}}" class="btn btn-sm btn-neutral">@lang('View all')</a>
                </div>
                <div class="icon">
                    <i class="fa fa-money"></i>
                </div>
            </div>
        </div>


        <div class="col-xl-3 col-lg-6 col-sm-6">
            <div class="dashboard-w2 slice bg-info border-radius-5">
                <div class="details">
                    <h2 class="amount mb-2 font-weight-bold">{{$general->cur_sym}}{{formatter_money($total_withdraw)}} </h2>
                    <h5 class="mb-3">@lang('Total') &nbsp; @lang('Withdraw')</h5>
                    <a href="{{route('user.withdraw')}}" class="btn btn-sm btn-neutral">@lang('View all')</a>
                </div>
                <div class="icon">
                    <i class="fa fa-money"></i>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-6 col-sm-6">
            <div class="dashboard-w2 slice bg-warning border-radius-5">
                <div class="details">
                    <h2 class="amount mb-2 font-weight-bold">{{$general->cur_sym}}{{formatter_money($ref_com)}}</h2>
                    <h5 class="mb-3">@lang('Referral Commission')</h5>
                    <a href="{{route('user.level.com')}}" class="btn btn-sm btn-neutral">@lang('View all')</a>
                </div>
                <div class="icon">
                    <i class="fa fa-money"></i>
                </div>
            </div>
        </div>


        <div class="col-xl-3 col-lg-6 col-sm-6">
            <div class="dashboard-w2 slice bg-info border-radius-5">
                <div class="details">
                    <h2 class="amount mb-2 font-weight-bold">{{$general->cur_sym}}{{formatter_money($level_com)}}</h2>
                    <h5 class="mb-3">@lang('Total Level Commission')</h5>
                    <a href="{{route('user.level.com')}}" class="btn btn-sm btn-neutral">@lang('View all')</a>
                </div>
                <div class="icon">
                    <i class="fa fa-money"></i>
                </div>
            </div>
        </div>


        <div class="col-xl-3 col-lg-6 col-sm-6">
            <div class="dashboard-w2 slice bg-dark border-radius-5">
                <div class="details">
                    <h2 class="amount mb-2 font-weight-bold">{{$general->cur_sym}}{{formatter_money($total_epin_recharge)}}</h2>
                    <h5 class="mb-3">@lang('Total E-Pin Recharged')</h5>
                    <a href="{{route('user.e_pin.recharge')}}" class="btn btn-sm btn-neutral">@lang('View all')</a>
                </div>
                <div class="icon">
                    <i class="fa fa-cart-plus"></i>
                </div>
            </div>
        </div>


        <div class="col-xl-3 col-lg-6 col-sm-6">
            <div class="dashboard-w2 slice bg-default border-radius-5">
                <div class="details">
                    <h2 class="amount mb-2 font-weight-bold">{{$general->cur_sym}}{{formatter_money($total_epin_generate)}}</h2>
                    <h5 class="mb-3">@lang('Total E-Pin Generated')</h5>
                    <a href="{{route('user.e_pin.generated')}}" class="btn btn-sm btn-neutral">@lang('View all')</a>
                </div>
                <div class="icon">
                    <i class="fa fa-plus-circle"></i>
                </div>
            </div>
        </div>



        <div class="col-xl-3 col-lg-6 col-sm-6">
            <div class="dashboard-w2 slice bg-blue border-radius-5">
                <div class="details">
                    <h2 class="amount mb-2 font-weight-bold">{{$general->cur_sym}}{{formatter_money($total_bal_transfer)}}</h2>
                    <h5 class="mb-3">@lang('Transferred Balance')</h5>
                    <a href="{{route('user.balance.tf.log')}}" class="btn btn-sm btn-neutral">@lang('View all')</a>
                </div>
                <div class="icon">
                    <i class="fa fa-random"></i>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-sm-6">
            <div class="dashboard-w2 slice bg-red border-radius-5">
                <div class="details">
                    <h2 class="amount mb-2 font-weight-bold">{{$total_direct_ref}}</h2>
                    <h5 class="mb-3">@lang('Total My Direct Referral')</h5>
                    <a href="{{route('user.ref.index')}}" class="btn btn-sm btn-neutral">@lang('View all')</a>
                </div>
                <div class="icon">
                    <i class="fa fa-sitemap"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6" style="height: 300px">
            {!! $ref_chart->container() !!}
        </div>
        <div class="col-sm-6" style="height: 300px">
            {!! $plan_chart->container() !!}
        </div>
    </div>

@endsection
@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
    {!! $ref_chart->script() !!}
    {!! $plan_chart->script() !!}
@endpush
