<div class="accordion-item">
    <h2 class="accordion-header" id="kt_accordion_{{ $parentId }}_header_{{ $id }}">
        <button class="accordion-button fs-4 fw-semibold {{ isset($show) ? '' : 'collapsed' }}" type="button"
            data-bs-toggle="collapse" data-bs-target="#kt_accordion_{{ $parentId }}_body_{{ $id }}"
            aria-expanded="true" aria-controls="kt_accordion_{{ $parentId }}_body_{{ $id }}">
            {{ $title }}
        </button>
    </h2>
    <div id="kt_accordion_{{ $parentId }}_body_{{ $id }}"
        class="accordion-collapse collapse {{ isset($show) ? 'show' : '' }}"
        aria-labelledby="kt_accordion_{{ $parentId }}_header_{{ $id }}"
        data-bs-parent="#kt_accordion_{{ $parentId }}">
        <div class="accordion-body">
            {{ $slot }}
        </div>
    </div>
</div>
