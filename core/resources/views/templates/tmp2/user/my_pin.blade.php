@extends(activeTemplate() .'layouts.app')




@section('content')



    <div class="row">

        <div class="col-lg-12">

            <div class="card">
                <div class="table-responsive table-responsive-xl">
                    <table class="table align-items-center table-light">
                        <thead>
                        <tr>
                            <th scope="col">@lang('Amount')</th>
                            <th scope="col">@lang('Pin')</th>
                            <th scope="col">@lang('Status')</th>
                        </tr>
                        </thead>


                        <tbody class="list">
                        @forelse($epin as $data)
                            <tr>
                                <td>{{$general->cur_sym}}{{ $data->amount }}</td>
                                <td>{{ $data->pin }}</td>

                                <td>@if($data->status == 1) <span class="badge badge-success">@lang('Not Used')</span> @else <span class="badge badge-warning">@lang('Used')</span> @endif</td>
                            </tr>
                        @empty

                            <tr>
                                <td class="text-muted text-center" colspan="100%">{{__('NO DATA FOUND')}}</td>
                            </tr>
                        @endforelse
                        </tbody>




                    </table>
                </div>
                <div class="card-footer py-4">
                    <nav aria-label="...">

                        {{$epin->links()}}
                    </nav>

                </div>
            </div>
        </div>
    </div>






    <div class="modal fade" id="createEpinModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel"> @lang('Create New Pin')</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <form  method="post" action="{{route('user.pin.generate')}}">
                    @csrf
                    <div class="modal-body text-center">

                        <strong class="text-center">@lang('Amount')</strong>
                        <div class="input-group">
                            <input type="text" class="form-control input-lg" name="amount">
                            <div class="input-group-append">
                            <span class="input-group-text">
                                {{__($general->cur_sym)}}
                            </span>
                            </div>

                        </div>
                        <small class="text-center text-danger">@lang('This amount will subtract from your wallet and generate new pin.')</small>
                    </div>
                    <div class="modal-footer">
                        <button type="submit"  class="btn btn-primary bold uppercase"><i class="fa fa-send"></i> @lang('Generate')</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> @lang('Close')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


@push('script')
    <script>
        $('#code').on('keypress change', function () {
            var xx = document.getElementById('code').value;
            if (xx.length < 32) {
                $(this).val(function (index, value) {
                    return value.replace(/\W/gi, '').replace(/(.{8})/g, '$1-');
                });
            }
        });
    </script>
@endpush