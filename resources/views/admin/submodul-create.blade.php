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
                <form action="{{ route('submodul.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id_modul" value="{{ $id_modul }}">
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="modul">Nama Sub Modul</label>
                                <input type="text" class="form-control @error('modul') is-invalid @enderror" id="modul"
                                    aria-describedby="emailHelp" name="modul" value="{{ old('modul') }}">
                                @error('modul')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="gambar">Gambar</label>
                                <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="emailHelp"
                                    aria-describedby="emailHelp" name="gambar" value="{{ old('gambar') }}">
                                <small id="emailHelp" class="form-text text-danger">Optional</small>
                                @error('gambar')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-success btn-block">Tambah</button>
                        </div>
                        <div class="col-8">
                            <div class="form-group">
                                <label for="isi">Isi</label>
                                <textarea class="form-control" name="isi" id="isi" cols="" rows="16"
                                    value="{{ old('isi') }}" style="height: 100%;"></textarea>
                                @error('isi')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>

                        </div>
                    </div>
                </form>
        </section>
    </div>
@endsection
