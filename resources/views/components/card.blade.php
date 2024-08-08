<div class="card">
    <!--begin::Card header-->
    @if (isset($title))
        <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
            data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
            <!--begin::Card title-->
            <div class="card-title m-0">
                <h3 class="fw-bold m-0">
                    {{ $title }}
                </h3>
            </div>
        </div>
    @endif
    <!--begin::Card header-->
    <!--begin::Content-->
    <div class="collapse show">
        <div class="card-body {{ isset($title) ? 'border-top' : '' }} p-9">
            {{ $slot }}
        </div>
    </div>
    <!--end::Content-->
</div>
