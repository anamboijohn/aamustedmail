@props(['id', 'error'])

<input {{ $attributes }} type="text" class="form-control datetimepicker-input @error($error) is-invalid @enderror"
    id="{{ $id }}" data-toggle="datetimepicker" data-target="#{{ $id }}"
    onchange="this.dispatchEvent(new InputEvent('input'))" placeholder="dd-mm-yyyy" />

@push('js')
    <script type="text/javascript">
        //Datepicker
        $('#{{ $id }}').datetimepicker({

            format: 'L'

        });
    </script>
@endpush
