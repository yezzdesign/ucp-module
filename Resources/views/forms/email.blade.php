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
