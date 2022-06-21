{{--
 /*
|--------------------------------------------------------------------------
| Design App
|--------------------------------------------------------------------------
|
| Generate the Design for these specific App
|
| Navigation are autogenerated with Links
| from Modules on start class on each provider
|
| @author:  Yezz.Design
| @mail:    yezz.design@schodie.de
| @version: 0.0.1 Alpha
|
*/
--}}
<x-acp::master
    {{-- Title is "Home - Modelname" --}}
    title="{{ $title??'UCP' }}"
    class="container mx-auto antialiased text-main_font {{$class??''}}">

    <x-slot:style>
        {{-- Add Google Font "Roboto" File --}}
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/ucp.css') }}">
    </x-slot:style>

    <x-slot:script>
        {{-- Add Font Awesome Files--}}
        <script src="https://kit.fontawesome.com/a810a42f9a.js" crossorigin="anonymous"></script>

        {{-- Laravel Asset - JS File --}}
        <script src="{{ asset('js/ucp.js') }}" defer></script>
    </x-slot:script>

    {{-- Load Navigation --}}
    <x-acp::navigation.app />

    {{-- Message Module - Error & Messages --}}
    <x-acp::messages />
{{-- Content --}}
{{ $slot }}
{{-- End Content--}}
</x-acp::master>
