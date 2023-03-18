<div>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-sm btn-{{ $btnclass }} mr-1" data-toggle="modal" data-target="#{{ $target }}">
        {{ $btn }}
    </button>

    <!-- Modal -->
    <div class="modal fade" id="{{ $target }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ $judul }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>
</div>
