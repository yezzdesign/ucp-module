<x-ucp::app title="{{__('ucp::index.title')}} - {{ config('ucp.name') }}">

    {{-- Header for Breadcrumb and create new Items --}}
    <x-acp::header>
        {{-- Breadcrumb --}}
        <x-acp::breadcrumb>
            <x-acp::breadcrumb.item-main    :href="route('acp.backend.index')">{{ __('acp::nav.home') }}</x-acp::breadcrumb.item-main>
            <x-acp::breadcrumb.item         :href="route('ucp.backend.index')">{{ __('ucp::nav.user') }}</x-acp::breadcrumb.item>
            <x-acp::breadcrumb.item                                           >{{ __('ucp::nav.index')}}</x-acp::breadcrumb.item>
        </x-acp::breadcrumb>
        {{-- Create new Button--}}
        <x-acp::forms.a-button ><i class="fa-solid fa-plus"></i> {{ __('ucp::index.button.add.user') }}</x-acp::forms.a-button>
        {{-- End Create new --}}
    </x-acp::header>
    {{-- End Header --}}

    {!! app('UCPIndexTable')->render( $users, 'user' ) !!}
    {{ $users->render() }}

</x-ucp::app>
