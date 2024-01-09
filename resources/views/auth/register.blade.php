<x-guest-layout>
    <x-authentication-card>
        <x-validation-errors class="mb-4" />
        
        <div class="grid grid-cols-3 gap-3">
            <div class=""></div>
            <div class="">  <a href="http://127.0.0.1:8000" class=" text-center"> <img src="{{ asset('images/logos.png') }}" width="166px" /></a></div>
            <div class=""></div>
        </div>
          <p class="text-4xl font-mono font-semibold py-10 text-center">  Registration<p>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-label for="name" value="{{ __('Name') }}" class="text-white"/>
                <x-input id="name" class="block mt-1 w-full py-2 text-gray-950" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" class="text-white"/>
                <x-input id="email" class="block mt-1 w-full py-2 text-gray-950" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>
           
           

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" class="text-white"/>
                <x-input id="password" class="block mt-1 w-full py-2 text-gray-950" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" class="text-white" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full py-2 text-gray-950" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class=" items-center mt-4">
                <a class="underline text-sm text-gray-100 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button>
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
