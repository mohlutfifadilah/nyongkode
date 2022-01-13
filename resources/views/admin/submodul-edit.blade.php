@extends('admin.layouts')
@section('title', 'Edit Sub Modul')
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Sub Modul</h1>
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
                <form action="/submodul/{{ $modul->id_sub_modul }}" method="POST" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <input type="hidden" name="id_modul" value="{{ $modul->id_modul }}">
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="modul">Nama Sub Modul</label>
                                <input type="text" class="form-control @error('modul') is-invalid @enderror" id="modul"
                                    aria-describedby="emailHelp" name="modul" value="{{ $modul->nama_sub_modul }}">
                                @error('modul')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-warning btn-block">Edit</button>
                        </div>
                        <div class="col-8">
                            <div class="form-group">
                                <label for="isi">Isi</label>
                                <textarea id="summernote" name="editordata">{!! $modul->isi !!}</textarea>
                                {{-- <textarea class="form-control @error('isi') is-invalid @enderror" name="isi" id="isi"
                                    cols="" rows="16" style="height: 100%;">{{ $modul->isi }}</textarea> --}}
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
                // callbacks: {
                //     onImageUpload: function(files) {
                //         // upload image to server and create imgNode...
                //         // console.log(files)
                //         uploadImage(files[0]);
                //     }
                // }
            });

            // function uploadImage(files) {
            //     console.log(files);
            // }
        });
    </script>
@endsection
