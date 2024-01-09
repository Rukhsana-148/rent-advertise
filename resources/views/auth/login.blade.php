<x-guest-layout>
    <x-authentication-card>
       
        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" >
            @csrf
<div class="grid grid-cols-3 gap-3">
    <div class=""></div>
    <div class="">  <a href="http://127.0.0.1:8000" class=" text-center"> <img src="{{ asset('images/logos.png') }}" width="166px" /></a></div>
    <div class=""></div>
</div>
          
<p style="font-weight:semibold; margin-bottom : 30px;" class="text-center text-[20px] text-white">Login</p>
            <div>
                <x-label for="email" value="{{ __('Email') }}" class="text-[18px] font-mono font-semibold text-white"/>
                <x-input id="email" class="block mt-1 w-full text-gray-950" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" style="padding:10px 4px;  width:300px;  border-radius:20px;"/>
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" class="text-[18px] font-mono font-semibold pr-10 text-white"/>
                <x-input id="password" class="block mt-1 w-full text-gray-950" type="password" name="password" required autocomplete="current-password" style="margin-left:5px;padding:10px 4px; width:300px;  border-radius:20px; margin-bottom : 10px;"/>
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-white ">{{ __('Remember me') }}</span>
                </label>
            </div>
            
            <div class="flex items-center justify-end -mt-8">
                @if (Route::has('password.request'))
                <a class="underline text-sm mt-2 text-white hover:text-orange-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 underline-none" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
                @endif

               
               
            </div>
            <div class="flex items-center justify-center">
                <x-button class="ml-4 mt-5 bg-gray-800 text-white" style="margin-left:10px; padding : 10px 25px; border-radius:10px; border:none;">
                    {{ __('Log in') }}
                </x-button>
            </div>
            <div class="mt-7">
                <a href="{{ route('register') }}" class="text-white text-center font-mono text-[17px]  hover:text-gray-950 pt-10">If you don't registration.Please registration.</a>
            </div>
          
        </form>

    </x-authentication-card>
</x-guest-layout>
