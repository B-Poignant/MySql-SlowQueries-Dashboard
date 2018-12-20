@empty($size)
    @php
        $size = '1';
    @endphp
@endempty
@php
    $class_size = 'fa-'.$size.'x';
@endphp

@switch($status)
    @case('done')
    <i title="{{ __('Done') }}" style="color:green;" class="fas fa-check {{$class_size}}"></i>
    @break

    @case('pending')
    <i title="{{ __('Pending') }}" style="color:yellow;" class="far fa-clock {{$class_size}}"></i>
    @break

    @case('processing')
    <i title="{{ __('Processing') }}" style="color:darkorange;" class="fas fa-cogs {{$class_size}}"></i>
    @break

    @case('error')
    <i title="{{ __('Error') }}" style="color:red;" class="far fa-times-circle {{$class_size}}"></i>
    @break

    @default
@endswitch