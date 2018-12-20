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
    <i title="{{ __('Status done') }}" style="color:green;" class="fas fa-check {{$class_size}}"></i>
    @break

    @case('pending')
    <i title="{{ __('Status pending') }}" style="color:yellow;" class="far fa-clock {{$class_size}}"></i>
    @break

    @case('processing')
    <i title="{{ __('Status processing') }}" style="color:darkorange;" class="fas fa-cogs {{$class_size}}"></i>
    @break

    @case('error')
    <i title="{{ __('Status error') }}" style="color:red;" class="far fa-times-circle {{$class_size}}"></i>
    @break

    @default
@endswitch