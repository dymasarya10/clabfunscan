<ol class="breadcrumb mb-0">
    @foreach ($navigation as $key => $item)
        <li class="breadcrumb-item text-capitalize {{ $key === sizeOf($navigation)-1 ? 'active' : '' }}">{{ $item }}</li>
    @endforeach
</ol>
