<x-guest-layout>
    <x-auth-card>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <x-slot name="logo">
        </x-slot>

        <span><b> Register Yourself as an ADMIN</b></span>

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                    autofocus />
            </div>
            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required />
            </div>
            <!-- Phone Number -->

            <div class="mt-4">
                <x-label for="phoneNumber" :value="__('Phone Number')" />
                <x-input type="tel" class="block mt-1 w-full" id="phone" name="phone" placeholder="98-4*1-**458" />
            </div>
            {{-- Interest --}}

            <div>
                <div class="mt-2">
                    <x-label for="health" :value="__('Feild of Interest')" />
                </div>
                <div class="mt-3 p-2 border-2 rounded  border-primary">
                    <input type="checkbox" id="health" name="interests[]" value="health" checked>
                    <label for="health">Health & Fitness&nbsp</label>
                    <input type="checkbox" id="agriculture" value="agriculture" name="interests[]">
                    <label for="agriculture">Agriculture&nbsp</label>
                    <input type="checkbox" id="lifestyle" value="lifestyle" name="interests[]">
                    <label for="scales">Lifestyle&nbsp</label><br>
                    <input type="checkbox" id="mental"  value="mental health" name="interests[]">
                    <label for="scales">Mental Health</label>
                </div>

            </div>
            <!-- Password -->
            <div class=" mt-4">
                <x-label for="password" :value="__('Password')" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->

            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
