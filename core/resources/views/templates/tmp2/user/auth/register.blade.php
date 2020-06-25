@extends(activeTemplate().'layouts.user-master')
@push('style-lib')
<link rel="stylesheet" href="{{asset(activeTemplate(true) .'build/css/intlTelInput.css')}}">
<style>
    .intl-tel-input {
        width: 100%;
    }

</style>
@endpush
@section('panel')

    <div class="signin-section pt-5">
        <div class="container-fluid">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-6 ">
                    <div class="login-area registration-form-area">
                        <div class="login-header-wrapper text-center">
                            <a href="{{url('/')}}" > <img class="logo" src="{{ get_image(config('constants.logoIcon.path') .'/logo.png') }}"
                                                          alt="image"> </a>
                            <p class="text-center admin-brand-text">@lang('User Sign Up')</p>
                        </div>
                        <form action="{{ route('user.register') }}" method="POST" class="login-form" id="recaptchaForm">
                            @csrf
                            <div class="login-inner-block">

                                <div class="form-row">
                                    <div class="frm-grp form-group col-md-6">

                                        <label>@lang('Full name')*</label>
                                        <input type="text" value="{{old('firstname')}}"
                                               placeholder="@lang('Enter your Full name')"
                                               name="firstname">
                                    </div>

                                    <!--<div class="frm-grp form-group col-md-6">

                                        <label>@lang('Surname')</label>
                                        <input type="text" value="{{old('surname')}}"
                                               placeholder="@lang('Enter your Surname')"
                                               name="surname">
                                    </div>-->
                                    @if(isset($ref_user))

                                        <div class="frm-grp form-group col-md-6">

                                            <label>@lang('Sponsor')</label>
                                            <input  type="text" value="{{$ref_user->username}}" name="ref_user" class="ref_user" disabled readonly>
                                            <input  type="hidden" value="{{$ref_user->id}}" class="ref_user_id" name="ref_id">

                                        </div>

                                    @else
                                        <div class="frm-grp form-group col-md-6">

                                            <label>@lang('Sponsor Email') (optional)</label>
                                            <input  type="text"  placeholder="@lang('Enter Sponsor email')" value="{{old('ref_user')}}" name="ref_user" class="ref_user" >
                                            <input type="hidden"  value="{{old('ref_id')}}" class="ref_user_id" name="ref_id">

                                        </div>
                                    @endif


                                    <div class="frm-grp form-group col-md-6">
                                        <label>@lang('Email')*</label>
                                        <input type="text" value="{{old('email')}}"
                                               placeholder="@lang('Enter your email')"
                                               name="email">
                                    </div>

                                    <div class="frm-grp form-group col-md-6">
                                        <label>@lang('Mobile')*</label>
                                        <input type="text" value="{{old('mobile')}}"
                                               placeholder="@lang('Enter your mobile number')"
                                               name="mobile">
                                    </div>
                                    <div class="frm-grp form-group col-md-6">
                                        <label>@lang('Country')*</label>

                                        <select class="frm-grp" name="country">
                                            <option selected="selected">Spain</option>
                                            @include('partials.country')
                                            <option>Spain</option>

                                        </select>
                                    </div>

                                    <div class="frm-grp form-group col-md-6">
                                        <label>@lang('Username')*</label>
                                        <input type="text" name="username"
                                               value="{{ old('username') }}" placeholder="@lang('Enter your username')">
                                    </div>

                                    <div class="frm-grp form-group col-md-6">
                                        <label>@lang('Password')*</label>
                                        <input type="password" name="password"
                                               placeholder="@lang('Enter your password')">
                                    </div>
                                    <div class="frm-grp form-group col-md-6">
                                        <label>@lang('Confirm Password')*</label>
                                        <input type="password" name="password_confirmation"
                                               placeholder="@lang('Confirm your password')">
                                    </div>
                                </div>
                            </div>

                            <div class="btn-area text-center">
                                <button type="submit" id="recaptcha" class="submit-btn">@lang('Sign Up')</button>
                            </div>
                            <br>

                            <div class="d-flex mt-3 justify-content-between">
                                <a href="{{ route('user.password.request') }}" class="forget-pass">@lang('Forget password?')</a>
                                <a href="{{route('user.login')}}"
                                   class="forget-pass">@lang('Sign In')</a>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection

@push('style-lib')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
<link rel="stylesheet" href="{{asset(activeTemplate(true) .'users/css/signin.css')}}">
<style>
    .registration-form-area .frm-grp+.frm-grp {
        margin-top: 0;
    }
    .registration-form-area .frm-grp label {
        color: #98a6ad!important;
        font-weight: 400;
    }
    .registration-form-area select {
        border: 1px solid #5220c5;
        width: 100%;
        padding: 12px 20px;
        color: #ffffff;;
        z-index: 9;
        background-color: #3c139c;
        border-radius: 3px;
    }
    .registration-form-area select option {
        color: #ffffff;
    }
</style>
@endpush


@push('js')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script>
    $(document).ready(function(){

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('[name="_token"]').val()
            }
        });
        $( ".ref_user" ).autocomplete({
            source: function( request, response ) {
                // Fetch data
                $.ajax({
                    url:  "{{ route('user.search_ref') }}",
                    type: 'post',
                    dataType: "json",
                    data: {
                        _token: $('[name="_token"]').val(),
                        search: request.term
                    },
                    success: function( data ) {
                        response( data );
                    }
                });
            },

            select: function (event, ui) {
                console.log(ui)
                $(this).parent().find(".ref_user_id").val(ui.item.value);
                $(this).val(ui.item.label);
                $(this).unbind("change");
                return false;
            }
        });
    });

</script>

@endpush
