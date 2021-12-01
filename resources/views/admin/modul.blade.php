@extends('admin.layouts')
@section('title', 'Modul')
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Modul</h1>
            </div>
            <div class="section-body mt-1">
                <div class="row">
                    <div class="col-4 offset-8">
                        <a href="{{ route('modul.create') }}" class="btn btn-success float-right mb-3">
                            <i class="fa fa-plus"></i> Tambah Modul</a>
                    </div>
                </div>
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
                <div class="row">
                    @foreach ($modul as $m)
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $m->nama_modul }}</h5>
                                    <p class="card-text">
                                        <i class="fas fa-columns mb-1"></i><span> Kategori :
                                            {{ DB::table('kategori_modul')->where('id_kategori_modul', $m->id_kategori_modul)->value('nama_kategori') }}</span>
                                        <br>
                                        <i class="fas fa-book-open"></i><span> Sub Modul :
                                            {{ DB::table('sub_modul')->where('id_modul', $m->id_modul)->count() }}</span>
                                    </p>
                                    <div class="float-right">
                                        <a href="{{ route('modul.show', $m->id_modul) }}" data-toggle="tooltip"
                                            class="edit btn btn-info">
                                            Detail
                                        </a>
                                        <a href="modul/{{ $m->id_modul }}/edit" data-toggle="tooltip"
                                            class="edit btn btn-warning edit">
                                            Edit
                                        </a>
                                        <button type="submit" class="btn btn-danger remove-user"
                                            data-id="{{ $m->id_modul }}"
                                            data-action="{{ route('modul.destroy', $m->id_modul) }}">
                                            Hapus
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
        </section>
    </div>
@endsection
{{-- @section('script')
    <script type="text/javascript">
        $("body").on("click", ".remove-user", function() {
            var current_object = $(this);
            swal({
                title: "Apakah anda yakin ?",
                text: "Ingin menghapus Kategori ini",
                type: "warning",
                showCancelButton: true,
                dangerMode: true,
                cancelButtonClass: '#DD6B55',
                confirmButtonColor: '#dc3545',
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal',
            }, function(result) {
                if (result) {
                    var action = current_object.attr('data-action');
                    var token = jQuery('meta[name="csrf-token"]').attr('content');
                    var id = current_object.attr('data-id');
                    $('body').html("<form class='form-inline remove-form' method='post' action='" + action +
                        "'></form>");
                    $('body').find('.remove-form').append(
                        '<input name="_method" type="hidden" value="delete">');
                    $('body').find('.remove-form').append('<input name="_token" type="hidden" value="' +
                        token + '">');
                    $('body').find('.remove-form').append('<input name="id" type="hidden" value="' + id +
                        '">');
                    $('body').find('.remove-form').submit();
                }
            });
        });
    </script>
@endsection --}}
