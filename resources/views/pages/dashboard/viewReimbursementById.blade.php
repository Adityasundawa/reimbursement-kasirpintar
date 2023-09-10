@extends('layouts.app')

@section('content')
    <div class="content-body" style="min-height: 788px;">
        <div class="container-fluid">
            <!-- Add Order -->
            <div class="modal fade" id="addOrderModalside">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add Event</h5>
                            <button type="button" class="close" data-dismiss="modal"><span>×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-group">
                                    <label class="text-black font-w500">Event Name</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="text-black font-w500">Event Date</label>
                                    <input type="date" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="text-black font-w500">Description</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <button type="button" class="btn btn-primary">Create</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Reimbusment</a></li>
                </ol>
            </div>
            <!-- row -->

            <div class="card">
                <div class="card-header bg-kasir">
                    <h4 class="text-white mb-0">Reimbusment</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="email-box clear-both ml-0 ml-sm-4 ml-sm-0">
                            <div class="row">
                                <div class="col-12">
                                    <div class="right-box-padding">

                                        <div class="read-content">
                                            <div class="media pt-3 d-sm-flex d-block justify-content-between">
                                                <div class="clearfix mb-3 d-flex">
                                                    <img class="mr-3 rounded" width="50" alt="image"
                                                        src="https://cdn-icons-png.flaticon.com/512/3177/3177440.png">
                                                    <div class="media-body mr-2">
                                                        <h5 class="text-primary mb-0 mt-1">{{ $user->name }}</h5>
                                                        <p class="mb-0">{{ $reimbursements->created_at }}</p>
                                                    </div>
                                                </div>
                                                <div class="clearfix mb-3">
                                                    @if ($reimbursements->status === 'waiting')
                                                        <span
                                                            class="badge badge-danger badge-sm text-white float-right">Waiting</span>
                                                    @elseif ($reimbursements->status === 'rejected')
                                                        <span
                                                            class="badge badge-danger badge-sm text-white float-right">Rejected</span>
                                                    @elseif ($reimbursements->status === 'approved')
                                                        <span
                                                            class="badge badge-success badge-sm text-white float-right">Approved</span>
                                                    @else
                                                        <span
                                                            class="badge badge-secondary badge-sm text-white float-right">Eror</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="media mb-2 mt-3">
                                                <div class="media-body"><span
                                                        class="pull-right">{{ optional($reimbursements->created_at)->format('h:i a') }}</span>
                                                    <h5 class="my-1 text-primary">{{ $reimbursements->subject }}</h5>
                                                    <p class="read-content-email">
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="read-content-body">
                                                {{ $reimbursements->description }}
                                            </div>
                                            <hr>
                                            <div class="read-content-attachment mt-5">
                                                <h6><i class="fa fa-download mb-2"></i> Attachments
                                                    <span></span>
                                                </h6>
                                                <div class="row attachment">
                                                    <div class="col-auto">
                                                        <a href="{{ $reimbursements->file }}" target="_blank"
                                                            class="text-muted">{{ $reimbursements->file }}</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <form action="{{ route('direktur.reimbursement.change.status', ['id' => $reimbursements->id]) }}" method="post">
                                               @csrf
                                                <div class="form-group">
                                                    <select name="status" class="form-control" id="">
                                                        <option selected>Select Status</option>
                                                        <option value="waiting">Waiting</option>
                                                        <option value="rejected">Rejected</option>
                                                        <option value="approved">Approved</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <textarea name="description_reason" id="write-email" cols="30" rows="5" class="form-control"
                                                        placeholder="Describe Your Reason (optional)"></textarea>
                                                </div>
                                                <div class="text-right">
                                                    <button class="btn btn-primary " type="submit">Send</button>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
