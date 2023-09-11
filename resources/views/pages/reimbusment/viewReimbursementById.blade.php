@extends('layouts.app')

@section('content')
    <div class="content-body" style="min-height: 788px;">
        <div class="container-fluid">
            <!-- Add Order -->

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
                        <div class="email-box">
                            <div class="row">
                                <div class="col-12">
                                    <div class="">

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
                                                <div class="container-fluid">
                                                    {!! $reimbursements->description !!}
                                                </div>
                                            </div>
                                            <hr>
                                            <a href="{{ url('/') }}/file/reimbusments/{{ $reimbursements->file }}"
                                                target="_blank" class="text-white">
                                                <div class="card bg-kasir mt-5">
                                                    <div class="card-body">
                                                        <div class="read-content-attachment">
                                                            <h6 class="text-white"><i
                                                                    class="fa fa-download mb-2 text-white"></i> Attachments
                                                                <span></span>
                                                            </h6>
                                                            <div class="row attachment">
                                                                <div class="col-auto">

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer text-white">
                                                        {{ $reimbursements->file }}
                                                    </div>
                                                </div>
                                            </a>
                                            <hr>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header bg-kasir">
                    <h4 class="text-white mb-0">Massage Form Direktur</h4>
                </div>
                <div class="card-body">
                    {{ $reimbursements->description_reason }}
                </div>
            </div>
        </div>
    </div>
@endsection
