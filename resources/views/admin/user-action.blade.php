<div class="mx-auto">
    <a href="user/{{ $id }}/edit" data-toggle="tooltip" class="edit btn btn-warning edit">
        Edit
    </a>
    <button type="submit" class="btn btn-danger remove-user" data-id="{{ $id }}"
        data-action="{{ route('user.destroy', $id) }}">
        Hapus
    </button>
</div>
