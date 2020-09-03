@extends(activeTemplate() .'layouts.master')

@section('content')
    @include(activeTemplate() .'layouts.breadcrumb')



    <section class="contact-section padding-bottom padding-top">
       
                    <div class="col-md-6">
                        <div class="contact-area">
                            <h2 class="title">@lang('Get In Touch')</h2>

                                <form class="contact-form-dynamic" action="{{route('send.mail.contact')}}" method="post">
                                    @csrf


                                <div class="form-group">
                                    <input type="text" placeholder="@lang('Your Name')" value="{{old('name')}}" name="name" id="name" required>
                                </div>
                                <div class="form-group">
                                    <input type="email" placeholder="@lang('Your Email')" value="{{old('email')}}" name="email" id="email" required>
                                </div>



                                <div class="form-group">
                                    <textarea placeholder="@lang('Type Message')" name="message"  id="message" required>{{old('message')}}</textarea>
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="@lang('send message')">
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>





@stop