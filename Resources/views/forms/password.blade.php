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
