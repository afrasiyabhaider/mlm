@extends(activeTemplate() .'layouts.app')

@section('style')

@stop
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card-header">
                <div class="row">
                    @for($i = 1; $i <= $general->matrix_height; $i++)
                        <div class="col-md-2 pb-3">
                            <a href="{{route('user.matrix.index', ['lv_no' => $i])}}" class="btn btn-primary btn-block">@lang('Level '.$i)</a>
                        </div>
                    @endfor
                </div>
            </div>
            <div class="card">
                <div class="table-responsive table-responsive-xl">
                    <table class="table align-items-center table-light">
                        <thead>
                        <tr>
                            <th scope="col">@lang('Username')</th>
                            <th scope="col">@lang('Under Position')</th>
                            <th scope="col">@lang('Ref. By')</th>
                            <th scope="col">@lang('Balance')</th>

                        </tr>
                        </thead>
                        <tbody class="list">
                        {{ showUserLevel(auth()->user()->id, $lv_no) }}
                        </tbody>

                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection


