<x-layout>
    <x-slot:heading>
        Login
    </x-slot:heading>
    <form method="POST" action="/login">
        @csrf

        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-4">
                        <x-form-label for="email" >Email</x-form-label>
                        <div class="mt-2">
                            <x-form-input required name="email" id="email" />
                            <x-form-error name="email"/>
                        </div>
                    </div>
                    <div class="sm:col-span-4">
                        <x-form-label for="password" >Password</x-form-label>
                        <div class="mt-2">
                            <x-form-input required name="password" id="password" type="password" />
                            <x-form-error name="password"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="/" class="text-sm/6 font-semibold text-gray-900">Cancel</a>
            <x-form-button>Login</x-form-button>

        </div>
    </form>

</x-layout>
