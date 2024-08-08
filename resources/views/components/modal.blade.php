<div class="modal fade {{ isset($show) ? 'show' : '' }} {{ isset($size) ? 'modal-' . $size : '' }}"
    id="{{ $id }}" style="display: {{ isset($show) ? 'block' : 'none' }}">
    <div class="modal-dialog">
        <div class="modal-content">
            @if (isset($title))
                <div class="modal-header">
                    <h3 class="modal-title">{{ $title }}</h3>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                    </div>
                </div>
            @endif

            <div class="modal-body">
                {{ $slot }}
            </div>

            @if (isset($footer))
                <div class="modal-footer">
                    {{ $footer }}
                </div>
            @endif
        </div>
    </div>
</div>
