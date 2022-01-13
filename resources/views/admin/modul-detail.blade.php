@extends('admin.layouts')
@section('title', 'Detail Modul')
@section('style')
    <style>
        [aria-expanded="false"] .card-header .expanded,
        [aria-expanded="true"] .card-header .collapsed {
            display: none;
        }

        .accordion .card a.card-link:hover,
        .accordion .card a.card-link:visited,
        .accordion .card a.card-link:focus {
            text-decoration: none;
            background-color: #6777EF;
            color: #ffffff;
        }

    </style>
@endsection
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Detail Modul</h1>
            </div>
            <div class="section-body mt-1">
                <div class="row">
                    <div class="col-4 offset-8">
                        <a href="/submodul/{{ $modul->id_modul }}" class="btn btn-success float-right mb-3">
                            <i class="fa fa-plus"></i> Tambah Sub Modul</a>
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
                    <div class="accordion" id="accordionExample">
                        @foreach ($sub as $s)
                            <div class="card">
                                <a class="card-link p-2 font-weight-bold" data-toggle="collapse"
                                    href="#sub{{ $s->id_sub_modul }}" aria-expanded="false" aria-controls="menuone"
                                    data-parent="#accordionExample">
                                    <div class="card-header d-inline">
                                        #{{ $loop->iteration }} &nbsp; {{ $s->nama_sub_modul }}
                                        <span class="collapsed float-right mr-4"><i class="fa fa-plus"></i></span>
                                        <span class="expanded float-right mr-4"><i class="fa fa-minus"></i></span>
                                    </div>
                                </a>
                                <div id="sub{{ $s->id_sub_modul }}" class="collapse" aria-labelledby="headingOne"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        {!! $s->isi !!}
                                        {{-- {{ $s->isi }} --}}
                                        <br>
                                        <div class="float-right p-2 mt-4 pb-4">
                                            <a href="/submodul/{{ $s->id_sub_modul }}/edit" data-toggle="tooltip"
                                                class="edit btn btn-warning edit">
                                                Edit
                                            </a>
                                            <button type="submit" class="btn btn-danger remove-user"
                                                data-id="{{ $s->id_sub_modul }}"
                                                data-action="{{ route('submodul.destroy', $s->id_sub_modul) }}">
                                                Hapus
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
        </section>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        $("body").on("click", ".remove-user", function() {
            var current_object = $(this);
            swal({
                title: "Apakah anda yakin ?",
                text: "Ingin menghapus Sub Modul ini",
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
@endsection
