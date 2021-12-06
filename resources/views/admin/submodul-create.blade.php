@extends('admin.layouts')
@section('title', 'Tambah Sub Modul')
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Sub Modul</h1>
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
                <form action="{{ route('submodul.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id_modul" value="{{ $id_modul }}">
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="modul">Judul</label>
                                <input type="text" class="form-control @error('modul') is-invalid @enderror" id="modul"
                                    aria-describedby="emailHelp" name="modul" value="{{ old('modul') }}">
                                @error('modul')
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
                                {{-- <textarea id="summernote" name="editordata">{{ old('isi') }}</textarea> --}}
                                <textarea id="summernote" name="editordata">{{ old('isi') }}</textarea>
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
@section('script')
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 308,
                dialogsInBody: true,
                placeholder: 'Tulis disini ...',
                fontSizes: ['8', '9', '10', '11', '12', '14', '18'],
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline']],
                    ['fontname', ['fontname']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['insert', ['link', 'picture', 'hr']],
                    ['view', ['codeview']],
                ],
            });
        });
    </script>
@endsection
