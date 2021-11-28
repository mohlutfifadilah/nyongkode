<div class="mx-auto">
    <a href="kategori/{{ $id_kategori_modul }}/edit" data-toggle="tooltip" class="edit btn btn-warning edit">
        Edit
    </a>
    <button type="submit" class="btn btn-danger remove-user" data-id="{{ $id_kategori_modul }}"
        data-action="{{ route('kategori.destroy', $id_kategori_modul) }}">
        Hapus
    </button>
</div>
