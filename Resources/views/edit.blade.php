<x-ucp::app title="{{__('ucp::edit.title')}} - {{ config('ucp.name') }}">

    {{-- Header for Breadcrumb and create new Items --}}
    <x-acp::header>

        {{-- Breadcrumb --}}
        <x-acp::breadcrumb>
            <x-acp::breadcrumb.item-main    :href="route('acp.backend.index')">{{ __('acp::nav.home') }}</x-acp::breadcrumb.item-main>
            <x-acp::breadcrumb.item         :href="route('ucp.backend.index')">{{ __('ucp::nav.user') }}</x-acp::breadcrumb.item>
            <x-acp::breadcrumb.item                                           >{{ __('ucp::nav.edit') }}</x-acp::breadcrumb.item>
        </x-acp::breadcrumb>
        {{-- End Breadcrumb --}}

    </x-acp::header>
    {{-- End Header --}}

    <div id="content">

        {!! app( 'UCPEditPage' )->render( $user, 'user' ) !!}

    </div>
</x-ucp::app>
