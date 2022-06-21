<x-ucp::app title="{{__('ucp::edit.title')}} - {{ config('ucp.name') }}">

    {{-- Header for Breadcrumb and create new Items --}}
    <x-acp::header>

        {{-- Breadcrumb --}}
        <x-acp::breadcrumb>
            <x-acp::breadcrumb.item-main    :href="route('acp.backend.index')">{{ __('acp::nav.home') }}</x-acp::breadcrumb.item-main>
            <x-acp::breadcrumb.item         :href="route('ucp.backend.index')">{{ __('ucp::nav.user') }}</x-acp::breadcrumb.item>
            <x-acp::breadcrumb.item                                           >{{ __('ucp::nav.edit')}}</x-acp::breadcrumb.item>
        </x-acp::breadcrumb>
        {{-- End Breadcrumb --}}

    </x-acp::header>
    {{-- End Header --}}


    <div id="content">
        <x-acp::forms.divider />
        <form action="{{ route('ucp.backend.password.change', $user) }}" method="post"> @csrf
            <x-acp::forms.create :title="__('ucp::edit.password.title')" :description="__('ucp::edit.password.description')">

                <x-acp::forms.item type="password" name="password_current" id="password_current" errorDBColumn="password_current" :placeholder="__('ucp::edit.password.placeholder.current')">
                    <x-slot:span><span class="inline-flex items-center px-3 border-y border-l border-main_brand/50 bg-main_brand/5 text-main_font/80 text-sm"><i class="fa-solid fa-lock w-4"></i></span></x-slot:span>
                </x-acp::forms.item>

                <x-acp::forms.item type="password" name="password_new" id="password_new" errorDBColumn="password_new" placeholder="{{__('ucp::edit.password.placeholder.new')}}">
                    <x-slot:span><span class="inline-flex items-center px-3 border-y border-l border-main_brand/50 bg-main_brand/5 text-main_font/80 text-sm"><i class="fa-solid fa-lock-open w-4"></i></span></x-slot:span>
                </x-acp::forms.item>

                <x-acp::forms.item type="password" name="password_new2" id="password_new2" errorDBColumn="password_new2" :placeholder="__('ucp::edit.password.placeholder.new2')">
                    <x-slot:span><span class="inline-flex items-center px-3 border-y border-l border-main_brand/50 bg-main_brand/5 text-main_font/80 text-sm"><i class="fa-solid fa-lock-open w-4"></i></span></x-slot:span>
                </x-acp::forms.item>

                <x-acp::forms.ibutton type="submit" :value="__('ucp::edit.password.button.submit')" bg="bg-main_brand/10 py-2 pr-2"/>

            </x-acp::forms.create>
        </form>

        <x-acp::forms.divider />

        <form action="{{ route('ucp.backend.email.change', $user) }}" method="post"> @csrf
            <x-acp::forms.create :title="__('ucp::edit.email.title')" :description="__('ucp::edit.email.description')">

                <x-acp::forms.item type="text" name="email_current" id="email_current" errorDBColumn="email_current" placeholder="{{$user->email}}" disabled="disabled">
                    <x-slot:span><span class="inline-flex items-center px-3 border-y border-l border-main_brand/50 bg-main_brand/5 text-main_font/80 text-sm"><i class="fa-solid fa-envelope w-4"></i></span></x-slot:span>
                </x-acp::forms.item>

                <x-acp::forms.item type="text" name="email" id="email" errorDBColumn="email" placeholder="{{__('ucp::edit.email.placeholder.new')}}">
                    <x-slot:span><span class="inline-flex items-center px-3 border-y border-l border-main_brand/50 bg-main_brand/5 text-main_font/80 text-sm"><i class="fa-solid fa-envelope-open w-4"></i></span></x-slot:span>
                </x-acp::forms.item>

                <x-acp::forms.item type="text" name="email_new2" id="email_new2" errorDBColumn="email_new2" :placeholder="__('ucp::edit.email.placeholder.new2')">
                    <x-slot:span><span class="inline-flex items-center px-3 border-y border-l border-main_brand/50 bg-main_brand/5 text-main_font/80 text-sm"><i class="fa-solid fa-envelope-open w-4"></i></span></x-slot:span>
                </x-acp::forms.item>

                <x-acp::forms.ibutton type="submit" :value="__('ucp::edit.email.button.submit')" bg="bg-main_brand/10 py-2 pr-2"/>

            </x-acp::forms.create>
        </form>

        <x-acp::forms.divider />

        <form action="{{ route('ucp.backend.user.delete', $user) }}" method="post"> @csrf @method('DELETE')
            <x-acp::forms.create :title="__('ucp::edit.delete.title')" :description="__('ucp::edit.delete.description')">

                <x-acp::forms.ibutton type="submit" :value="__('ucp::edit.delete.button.submit')" bg="bg-main_brand/10 py-2 pr-2"/>

            </x-acp::forms.create>
        </form>

        <x-acp::forms.divider />


    </div>
</x-ucp::app>
