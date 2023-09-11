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
                            <button type="button" class="btn btn-primary mb-2" data-toggle="modal"
                                data-target="#exampleModalCenter">Add Account</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-responsive-md">
                                    <thead>
                                        <tr>

                                            <th>NIP</th>
                                            <th>NAME</th>
                                            <th>Email</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>

                                                <td><strong>{{ $user['nip'] }}</strong></td>
                                                <td>
                                                    <div class="d-flex align-items-center"> <span
                                                            class="w-space-no">{{ $user['name'] }}</span></div>
                                                </td>
                                                <td>{{ $user['email'] }}</td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a href="{{ route('user.edit', $user['id']) }}"
                                                            class="btn btn-primary shadow btn-xs sharp mr-1">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                        <a href="{{ route('direktur.delete', $user['id']) }}"
                                                            class="btn btn-danger shadow btn-xs sharp"><i
                                                                class="fa fa-trash"></i></a>

                                                    </div>
                                                </td>
                                        @endforeach

                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="exampleModalCenter">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <form action="{{ route('direktur.save') }}" method="post">
                                @csrf

                                <div class="modal-header">
                                    <h5 class="modal-title">Add Direktur</h5>
                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                </div>

                                <div class="modal-body">
                                    <!-- NIP field -->
                                    <div class="form-group">
                                        <label for="nip">NIP</label>
                                        <input type="text" class="form-control" id="nip" name="nip"
                                            placeholder="Enter NIP" required>
                                    </div>

                                    <!-- NAMA field -->
                                    <div class="form-group">
                                        <label for="nama">Name</label>
                                        <input type="text" class="form-control" id="nama" name="name"
                                            placeholder="Enter Name" required>
                                    </div>

                                    <!-- EMAIL field -->
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="Enter Email" required>
                                    </div>

                                    <!-- JABATAN field -->
                                    <div class="form-group">
                                        <label for="jabatan">Jabatan</label>
                                        <select name="role_id" id="role_id" class="form-control">
                                            @foreach ($role as $role)
                                                <option value="{{ $role->uuid }}"
                                                    {{ (old('role_id') ?? $user->role_id) == $role->id ? 'selected' : '' }}>
                                                    {{ $role->name }}
                                                </option>
                                            @endforeach
                                        </select>

                                    </div>

                                    <!-- PASSWORD field -->
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password" name="password"
                                            placeholder="Enter Password" required>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger light"
                                        data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
