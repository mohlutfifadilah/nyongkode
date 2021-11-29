@extends('admin.layouts')
@section('title', 'Detail Modul')
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
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                        data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Collapsible Group Item #1
                                        <span class="fa-stack fa-sm text-right">
                                            <i class="fas fa-circle"></i></span>
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    Some placeholder content for the first accordion panel. This panel is shown by default,
                                    thanks to the <code>.show</code> class.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button"
                                        data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false"
                                        aria-controls="collapseTwo">
                                        Collapsible Group Item #2
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    Some placeholder content for the second accordion panel. This panel is hidden by
                                    default.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingThree">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button"
                                        data-toggle="collapse" data-target="#collapseThree" aria-expanded="false"
                                        aria-controls="collapseThree">
                                        Collapsible Group Item #3
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    And lastly, the placeholder content for the third and final accordion panel. This panel
                                    is hidden by default.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <h1>{{ $modul->id_modul }}</h1>

                        <div class="list-group" id="list-tab" role="tablist">
                            <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list"
                                href="#list-home" role="tab" aria-controls="home">Home</a>
                            <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list"
                                href="#list-profile" role="tab" aria-controls="profile">Profile</a>
                            <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list"
                                href="#list-messages" role="tab" aria-controls="messages">Messages</a>
                            <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list"
                                href="#list-settings" role="tab" aria-controls="settings">Settings</a>
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="list-home" role="tabpanel"
                                aria-labelledby="list-home-list">...</div>
                            <div class="tab-pane fade" id="list-profile" role="tabpanel"
                                aria-labelledby="list-profile-list">...</div>
                            <div class="tab-pane fade" id="list-messages" role="tabpanel"
                                aria-labelledby="list-messages-list">...</div>
                            <div class="tab-pane fade" id="list-settings" role="tabpanel"
                                aria-labelledby="list-settings-list">...</div>
                        </div>
                    </div>
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
