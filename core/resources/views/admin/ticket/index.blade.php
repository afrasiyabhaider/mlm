@extends('admin.layouts.app')

@section('panel')
    <div class="row">

        <div class="col-lg-12">
            <div class="card">
                <div class="table-responsive table-responsive-xl">
                    <table class="table align-items-center table-light">
                        <thead>
                        <tr>
                            <th scope="col">Ticket</th>
                            <th scope="col">Subject</th>
                            <th scope="col">User</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody class="list">
                        @forelse($tickets as $ticket)
                            <tr>
                                <td>{{ $ticket->ticket }}</td>
                                <td>{{ description_shortener($ticket->subject, 120) }}</td>
                                <td>{{ $ticket->user->username }}</td>
                                <td>



                                    @if($ticket->status == 0)
                                        <span class="badge badge-danger">Closed</span>
                                    @else
                                        @php
                                            $reply = \App\SupportTicketComment::orderBy('id', 'DESC')->where('ticket_id', $ticket->id)->first();
                                        @endphp
                                        @if ($reply->type == 0)
                                            <span class="badge badge-primary">@lang('customer reply')</span>
                                        @else
                                            <span class="badge badge-info">@lang('admin reply')</span>
                                        @endif



                                        <span class="badge badge-success">Open</span>
                                    @endif
                                </td>
                                <td>
                                    @if($ticket->status == 1)
                                        <button type="button" data-action="{{ route('admin.ticket.close', $ticket->id) }}" class="btn btn-rounded btn-danger closeBtn"><i class="fa fa-fw fa-times"></i> @lang('Close Ticket')</button>
                                    @endif
                                    <a href="{{ route('admin.supportTicket.reply', [$ticket->id, slug($ticket->ticket)]) }}" class="btn btn-rounded btn-primary replyBtn"><i class="fa fa-fw fa-reply"></i>Reply</a>
                                </td>
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
                        {{ $tickets->appends($_GET)->links() }}
                    </nav>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="ticketModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">@lang('New Ticket')</h5>
                    <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.supportTicket.new') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>@lang('User')</label>
                            <select name="user_id" id="" class="form-control select2">
                                @foreach ($users as $item)
                                    <option value="{{$item->id}}">
                                        {{$item->username}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>@lang('Subject')</label>
                            <input type="text" class="form-control" name="subject" value="{{old('subject')}}">
                        </div>
                        <div class="form-group">
                            <label>@lang('Message')</label>
                            <textarea rows="5" class="form-control" name="message">{{old('message')}}</textarea>
                        </div>
                    </div>
                    <div class="modal-footer">

                        <button type="button" class="btn btn-dark" data-dismiss="modal">@lang('Close')</button>
                        <button type="submit" class="btn btn-success">@lang('Open Ticket')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="closeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content  ">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">@lang('Close Ticket')</h5>
                    <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST">
                    @csrf
                    <div class="modal-body">
                        <p>@lang('By closing this ticket you ensure your problem has been solved')</p>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger">@lang('Close Ticket')</button>
                        <button type="button" class="btn btn-dark" data-dismiss="modal">@lang('Close')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@push('breadcrumb-plugins')
    <a class="btn btn-success " data-target="#ticketModal" data-toggle="modal"><i class="fa fa-fw fa-plus"></i>Open Ticket</a>
@endpush
@push('script')
    <script>
        $('.closeBtn').on('click', function() {
            var modal = $('#closeModal');
            modal.find('form').attr('action', $(this).data('action'));
            modal.modal('show');
        });
    </script>
@endpush
