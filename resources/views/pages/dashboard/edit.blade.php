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
                <li class="breadcrumb-item"><a href="javascript:void(0)">Table</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Bootstrap</a></li>
            </ol>
        </div>
        <!-- row -->

        <div class="row">

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Users Account</h4>
                        <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#exampleModalCenter">Add Account</button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <form method="POST" action="{{ route('user.update', $user->id) }}">
                                @csrf
                                @method('PUT')

                                <!-- NIP field -->
                                <div class="form-group">
                                    <label for="nip">{{ __('NIP') }}</label>
                                    <input type="text" class="form-control @error('nip') is-invalid @enderror" id="nip" name="nip" value="{{ old('nip', $user->nip) }}" required>
                                    @error('nip')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- NAMA field -->
                                <div class="form-group">
                                    <label for="nama">{{ __('Name') }}</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="nama" name="name" value="{{ old('name', $user->name) }}" required>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- EMAIL field -->
                                <div class="form-group">
                                    <label for="email">{{ __('Email') }}</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- JABATAN field -->
                                <div class="form-group">
                                    <label for="jabatan">{{ __('Jabatan') }}</label>
                                    <select name="role_id" id="role_id" class="form-control @error('role_id') is-invalid @enderror">
                                        <option value="{{ $role_selected->uuid }}" selected>{{ $role_selected->name }}</option>
                                        @foreach($roles as $role)
                                            @if ($role_selected->uuid !== $role->uuid)
                                                <option value="{{ $role->uuid }}">{{ $role->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>

                                    @error('role_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- PASSWORD field -->
                                <div class="form-group">
                                    <label for="password">{{ __('Password') }}</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="{{ __('Enter New Password') }}">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-0">
                                    <button type="submit" class="btn btn-primary">{{ __('Save Changes') }}</button>
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
@endsection
