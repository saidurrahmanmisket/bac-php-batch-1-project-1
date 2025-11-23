<!DOCTYPE html>
<html lang="en">
<head>
    {{-- include style and meta tags --}}
    @include('frontend.partials.style')
</head>

<body>
{{-- include header and loader --}}
@include('frontend.partials.header')


{{-- add daynamic content --}}
@yield('content')



{{-- add footer and  --}}
@include('frontend.partials.footer')

{{-- include all scripts --}}
@include('frontend.partials.script')
</body>
</html>