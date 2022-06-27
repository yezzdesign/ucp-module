<form action="{{ route('ucp.backend.user.delete', $user) }}" method="post"> @csrf @method('DELETE')
    <x-acp::forms.create :title="__('ucp::edit.delete.title')" :description="__('ucp::edit.delete.description')">

        <x-acp::forms.ibutton type="submit" :value="__('ucp::edit.delete.button.submit')" bg="bg-main_brand/10 py-2 pr-2"/>

    </x-acp::forms.create>
</form>
