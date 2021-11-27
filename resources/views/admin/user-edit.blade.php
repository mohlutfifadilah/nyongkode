@extends('admin.layouts')
@section('title', 'Edit User')
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit User</h1>
            </div>
            <div class="section-body mt-1">
                @if (session('status'))
                    <script>
                        swal({
                            text: "{!! session('status') !!}",
                            title: "{!! session('title') !!}",
                            type: "{!! session('type') !!}",
                            icon: "{!! session('type') !!}",
                            // more options
                        });
                    </script>
                @endif
                <form action="{{ route('user.update', $user->id) }}" method="POST">
                    @method('put')
                    @csrf
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Level</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="level">
                                    @if ($user->id_level == 1)
                                        <option selected>Admin</option>
                                        <option>User</option>
                                        <option>Super User</option>
                                    @elseif ($user->id_level == 2)
                                        <option selected>User</option>
                                        <option>Admin</option>
                                        <option>Super User</option>
                                    @else
                                        <option selected>Super User</option>
                                        <option>Admin</option>
                                        <option>UserUser</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>
                    @if ($user->email == true)
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email"
                                        aria-describedby="emailHelp" name="email" value="{{ $user->email }}">
                                    @error('email')
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                                    aria-describedby="emailHelp" name="nama" value="{{ $user->nama }}">
                                @error('nama')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control @error('username') is-invalid @enderror"
                                    id="username" aria-describedby="emailHelp" name="username"
                                    value="{{ $user->username }}">
                                @error('username')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    id="password" aria-describedby="emailHelp" name="password">
                                @error('password')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password-confirm">Konfirmasi
                                    Password</label>
                                <input id="password-confirm" type="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    name="password_confirmation" autocomplete="off">
                                @error('password')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-4 offset-4">
                            <button type="submit" class="btn btn-warning float-right">Edit</button>
                        </div>
                    </div>
                </form>
        </section>
    </div>
@endsection
