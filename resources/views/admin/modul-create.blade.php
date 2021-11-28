@extends('admin.layouts')
@section('title', 'Tambah Modul')
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Modul</h1>
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
                <form action="{{ route('modul.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Kategori</label>
                                <select class="form-control @error('kategori') is-invalid @enderror"
                                    id="exampleFormControlSelect1" name="kategori">
                                    <option selected disabled>Pilih Kategori</option>
                                    @foreach ($kategori as $k)
                                        <option value="{{ $k->nama_kategori }}">{{ $k->nama_kategori }}</option>
                                    @endforeach
                                </select>
                                @error('kategori')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="modul">Nama Modul</label>
                                <input type="text" class="form-control @error('modul') is-invalid @enderror" id="modul"
                                    aria-describedby="emailHelp" name="modul" value="{{ old('modul') }}">
                                @error('modul')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <button type="submit" class="btn btn-success float-right">Tambah</button>
                        </div>
                    </div>
                </form>
        </section>
    </div>
@endsection
