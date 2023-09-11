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

            <div class="row">
                <div class="col-lg-12">
                     <a href="{{ route('staff.reimbursement.add') }}" class="btn btn-primary mb-2">+ Add Reimbusment</a>
                    <div class="card">
                        <div class="card-header bg-kasir">
                            <h4 class="text-white mb-0">Reimbusment List</h4>

                        </div>
                        <div class="card-body">

                            <div class="email-box">

                                <div class="email-list mt-3">

                                    @foreach ($reimbursements as $reimbursement)
                                    <div class="message">
                                        <div>
                                            <div class="d-flex message-single">
                                                <div class="pl-1 align-self-center">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="checkbox2">
                                                        <label class="custom-control-label" for="checkbox2"></label>
                                                    </div>
                                                </div>
                                                <div class="ml-2">
                                                    <button class="border-0 bg-transparent align-middle p-0"><i
                                                            class="fa fa-star" aria-hidden="true"></i></button>
                                                </div>
                                            </div>
                                            <a href="{{ route('staff.reimbursement.show', ['id' => $reimbursement->id]) }}"
                                                class="col-mail col-mail-2">
                                                <div class="subject">
                                                    @if ($reimbursement->read)
                                                        {{ $reimbursement->subject }}
                                                    @else
                                                        <b>{{ $reimbursement->subject }}</b>
                                                    @endif
                                                </div>
                                                <div class="date">{{ optional($reimbursement->created_at)->format('h:i a') }}</div>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                                </div>
                                <!-- panel -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

