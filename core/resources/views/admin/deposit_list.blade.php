@extends('admin.layouts.app')

@section('panel')
    <div class="row">

        <div class="col-lg-12">
            <div class="card">

                <div class="table-responsive table-responsive-xl">
                    <table class="table align-items-center table-light">
                        <thead>
                        <tr>
                            <th scope="col">Date</th>
                            <th scope="col">Deposit Code</th>
                            <th scope="col">Username</th>
                            <th scope="col">Deposit Method</th>
                            <th scope="col">Total Amount</th>
                            <th scope="col">Charge</th>
                            <th scope="col">Receivable Amount</th>
                            <th scope="col">In Method Currency</th>
                            @if(request()->routeIs('admin.deposit.pending') )
                                <th scope="col">Action</th>
                            @elseif(request()->routeIs('admin.deposit.list') || request()->routeIs('admin.deposit.search'))
                                <th scope="col">Status</th>
                            @endif
                        </tr>
                        </thead>
                        <tbody>
                        @forelse( $deposits as $deposit )
                            <tr>
                                <td>{{ show_datetime($deposit->created_at) }}</td>
                                <td class="font-weight-bold text-uppercase">{{ $deposit->trx }}</td>
                                <td><a href="{{ route('admin.users.detail', $deposit->user->id) }}">{{ $deposit->user->username }}</a></td>
                                <td>{{ $deposit->gateway->name }}</td>
                                <td class="text-primary">{{ $general->cur_text }} {{ formatter_money($deposit->amount+$deposit->charge) }}</td>
                                <td class="text-danger">{{ $general->cur_text }} {{ formatter_money($deposit->charge) }}</td>
                                <td class="text-success">{{ $general->cur_text }} {{ formatter_money($deposit->amount) }}</td>
                                <td>{{ $deposit->method_currency }} {{ formatter_money($deposit->final_amo) }}</td>
                                @if(request()->routeIs('admin.deposit.pending'))
                                    <td>
                                        <button class="btn btn-success approveBtn" data-id="{{ $deposit->id }}" data-amount="{{ $general->cur_text }}{{ formatter_money($deposit->amount) }}" data-username="{{ $deposit->user->username }}"><i class="fa fa-fw fa-check"></i></button>
                                        <button class="btn btn-danger rejectBtn" data-id="{{ $deposit->id }}" data-amount="{{ $general->cur_text }}{{ formatter_money($deposit->amount) }}" data-username="{{ $deposit->user->username }}"><i class="fa fa-fw fa-ban"></i></button>
                                        <button class="btn btn-info viewBtn" data-img="{{ asset(config('constants.deposit.verify.path') .'/'. $deposit->verify_image) }}" data-detail="{{ json_encode($deposit->detail) }}"><i class="fa fa-fw fa-eye"></i></button>
                                    </td>
                                @elseif(request()->routeIs('admin.deposit.list') || request()->routeIs('admin.deposit.search'))
                                    <td>
                                        @if($deposit->status == 2)
                                            <span class="badge badge-warning">Pending</span>
                                        @elseif($deposit->status == 1)
                                            <span class="badge badge-success">Approved</span>
                                        @elseif($deposit->status == 3)
                                            <span class="badge badge-danger">Rejected</span>
                                        @endif
                                    </td>
                                @endif
                            </tr>
                        @empty
                            <tr>
                                <td class="text-muted text-center" colspan="100%">{{ $empty_message }}</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="card-footer py-4">
                    <nav aria-label="...">
                        {{ $deposits->appends($_GET)->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </div>


    {{-- VIEW MODAL --}}
    <div id="viewModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">View User Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 mb-5"><img src="" class="verify_image"></div>
                        <div class="col-md-12">
                            <table class="table table-bordered">

                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    {{-- APPROVE MODAL --}}
    <div id="approveModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Approve Deposit Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.deposit.approve') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id">
                    <div class="modal-body">
                        <p>Are you sure to <span class="font-weight-bold">approve</span> <span class="font-weight-bold withdraw-amount text-success"></span> deposit of <span class="font-weight-bold withdraw-user"></span>?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Approve</button>
                        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- REJECT MODAL --}}
    <div id="rejectModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Reject Deposit Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.deposit.reject') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id">
                    <div class="modal-body">
                        <p>Are you sure to <span class="font-weight-bold">reject</span> <span class="font-weight-bold withdraw-amount text-success"></span> deposit of <span class="font-weight-bold withdraw-user"></span>?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Reject</button>
                        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $('.approveBtn').on('click', function() {
            var modal = $('#approveModal');
            modal.find('input[name=id]').val($(this).data('id'));
            modal.find('.withdraw-amount').text($(this).data('amount'));
            modal.find('.withdraw-user').text($(this).data('username'));
            modal.modal('show');
        });
        $('.viewBtn').on('click', function() {
            var modal = $('#viewModal');
            var data = $(this).data('detail');
            modal.find('.table').html('');
            modal.find('.verify_image').attr('src', '');
            modal.find('.verify_image').attr('src', $(this).data('img'));

            html = '';
            $.each(data, function(key, value) {
                html += `<tr>`;
                html += `<td>${key}</td>`;
                html += `<td>${value}</td>`;
                html += `</tr>`;
            });
            modal.find('.table').html(html);
            modal.modal('show');
        });

        $('.rejectBtn').on('click', function() {
            var modal = $('#rejectModal');
            modal.find('input[name=id]').val($(this).data('id'));
            modal.find('.withdraw-amount').text($(this).data('amount'));
            modal.find('.withdraw-user').text($(this).data('username'));
            modal.modal('show');
        });
    </script>
@endpush

@push('breadcrumb-plugins')
    @if(request()->routeIs('admin.users.deposits'))
        <form action="" method="GET" class="form-inline">
            <div class="input-group has_append">
                <input type="text" name="search" class="form-control" placeholder="Deposit code" value="{{ $search ?? '' }}">
                <div class="input-group-append">
                    <button class="btn btn-success" type="submit"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </form>
    @else
        <form action="{{ route('admin.deposit.search', $scope ?? str_replace('admin.deposit.', '', request()->route()->getName())) }}" method="GET" class="form-inline">
            <div class="input-group has_append">
                <input type="text" name="search" class="form-control" placeholder="Deposit code/Username" value="{{ $search ?? '' }}">
                <div class="input-group-append">
                    <button class="btn btn-success" type="submit"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </form>
    @endif
@endpush
