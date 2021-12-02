@extends('admin.layouts')
@section('title', 'Edit Modul')
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Modul</h1>
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
                <form action="{{ route('modul.update', $modul->id_modul) }}" method="POST">
                    @method('put')
                    @csrf
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Kategori</label>
                                <select class="form-control @error('kategori') is-invalid @enderror"
                                    id="exampleFormControlSelect1" name="kategori">
                                    <option selected
                                        value="{{ DB::table('kategori_modul')->where('id_kategori_modul', $modul->id_kategori_modul)->value('nama_kategori') }}">
                                        {{ DB::table('kategori_modul')->where('id_kategori_modul', $modul->id_kategori_modul)->value('nama_kategori') }}
                                    </option>
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
                                    aria-describedby="emailHelp" name="modul" value="{{ $modul->nama_modul }}">
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
                            <button type="submit" class="btn btn-warning float-right">Edit</button>
                        </div>
                    </div>
                </form>
        </section>
    </div>
@endsection
