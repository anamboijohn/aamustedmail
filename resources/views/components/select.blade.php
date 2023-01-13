@props(['placeholder' => 'Select Options', 'id'])

<div wire:ignore>
    <select {{ $attributes }} id="{{ $id }}" class="form-control select2bs4 select2-hidden-accessible"
        style="width: 100%;" data-select2-id="17" tabindex="-1" aria-hidden="true" data-placeholder="{{ $placeholder }}"
        style="width: 100%;">
        {{ $slot }}
    </select>
</div>

@once
    @push('styles')
        <!-- Select2 -->
        <link rel="stylesheet" href="{{ asset('backend/public/vendors/select2/css/select2.min.css') }}">
        <link rel="stylesheet" href="{{ asset('backend/public/vendors/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    @endpush
@endonce

@once
    @push('js')
        <!-- Select2 -->
        <script src="{{ asset('backend/public/vendors/select2/js/select2.full.min.js') }}"></script>
    @endpush
@endonce

@push('js')
    <script>
        $(function() {
            $('#{{ $id }}').select2({
                theme: 'bootstrap4',
            })
        })
    </script>
@endpush
