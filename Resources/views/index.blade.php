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

    <x-acp::table>
        <x-acp::table.header>
            <x-acp::table.header.item> {{ __('ucp::index.table.head.option') }}   </x-acp::table.header.item>
            <x-acp::table.header.item> {{ __('ucp::index.table.head.id') }}       </x-acp::table.header.item>
            <x-acp::table.header.item> {{ __('ucp::index.table.head.email') }}    </x-acp::table.header.item>
            <x-acp::table.header.item> {{ __('ucp::index.table.head.role') }}     </x-acp::table.header.item>
            <x-acp::table.header.item> {{ __('ucp::index.table.head.date') }}     </x-acp::table.header.item>
        </x-acp::table.header>
        {{-- Begin Table Body--}}
        <x-acp::table.body>
            @foreach($users as $user)
                <x-acp::table.tr>
                    <!-- -->
                    <x-acp::table.td class="w-52">
                        <div class="flex flex-none">
                            {{-- Option Edit--}}
                            <x-acp::forms.opt-button :href="route('ucp.backend.edit', $user)">          <i class="fa-solid fa-pencil w-8 fa-xl"></i> </x-acp::forms.opt-button>
                            {{-- --}}

                            {{-- Option State--}}
                            @if($user->status)              <x-acp::forms.opt-button :href="route('ucp.backend.status.update', $user)"><i class="fa-solid fa-toggle-on text-main_brand_success w-8 fa-xl"></i></x-acp::forms.opt-button>
                            @elseif($user->status == false) <x-acp::forms.opt-button :href="route('ucp.backend.status.update', $user)"><i class="fa-solid fa-toggle-off text-main_brand_error w-8 fa-xl"></i></x-acp::forms.opt-button>
                            @endif
                            {{-- --}}

                            {{-- Option Delete--}}
                            <form action="{{ route('ucp.backend.user.delete', $user) }}" method="post"> @csrf @method('DELETE')
                                <x-acp::forms.opt-button :href="route('ucp.backend.user.delete', $user)"
                                                         onclick="event.preventDefault();
                                                         this.closest('form').submit();">
                                    <i class="fa-solid fa-trash w-8 fa-xl hover:text-main_brand_error"></i>
                                </x-acp::forms.opt-button>
                            </form>
                            {{-- --}}
                        </div>
                    </x-acp::table.td>
                    <!-- -->
                    <!-- -->
                    <x-acp::table.td>{{ $user->id }}</x-acp::table.td>
                    <!-- -->
                    <!-- -->
                    <x-acp::table.td><div class="flex flex-col justify-center"><div class="p-1">{{ $user->email }}</div><div class="p-1 text-xs font-bold ">{{$user->name}}</div></div></x-acp::table.td>
                    <!-- -->
                    <!-- -->
                    @if($user->role === 'admin')    <x-acp::table.td><span class="leading-4 rounded-sm bg-main_brand_error/30 border border-main_brand_error py-2 px-4 uppercase">{{ __('ucp::index.table.role.admin') }}</span></x-acp::table.td>
                    @elseif($user->role === 'user') <x-acp::table.td><span class="leading-4 rounded-sm bg-main_brand_success/50 border border-main_brand_success py-2 px-4 uppercase">{{ __('ucp::index.table.role.user') }}</span></x-acp::table.td>
                    @endif
                    <!-- -->
                    <!-- -->
                    <x-acp::table.td><span>{{ \Carbon\Carbon::parse($user->created_at)->locale('de_DE')->format('d.m.Y') }}</span></x-acp::table.td>
                    <!-- -->
                </x-acp::table.tr>
            @endforeach
            <x-acp::table.tr>

                <x-acp::table.td colspan="5" class="space-x-96">{{ $users->links() }}</x-acp::table.td>
            </x-acp::table.tr>
        </x-acp::table.body>
        {{-- End Table Body--}}

    </x-acp::table>




</x-ucp::app>
