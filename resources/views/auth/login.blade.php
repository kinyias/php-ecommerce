<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <div  class="flex flex-col gap-6">
        <div class="text-center">
            <div class="text-2xl text-black text-3xl">Log in</div>
            <div class="text-base">Don’t have an ccount? <a href="{{route('register')}}" class="underline">Sign up</a></div>
        </div>
        <div class="flex flex-col gap-2">
            <a href="/auth/facebook/redirect" type="button" class="flex justify-center items-center gap-1 flex-grow border-solid border rounded-full py-2 hover:underline">
                <img class="w-8" src="{{asset('images/social-media-fb-icon.svg')}}" alt="">
                <div class="text-xl">Log in with Facebook</div>
            </a>
            <a href="/auth/google/redirect" type="button" class="flex justify-center items-center gap-1 flex-grow border-solid border rounded-full py-2   hover:underline hover:cursor-pointer" >
                <img class="w-8" src="{{asset('images/social-media-google-icon.svg')}}" alt="">
                <div class="text-xl">Log in with Google</div>
            </a>
        </div>
        <form method="POST" action="{{ route('login') }}" class="flex flex-col"> 
            @csrf
            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div>
            <button class="flex-grow text-center bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase rounded-3xl py-3 hover:bg-gray-700">
                {{ __('Log in') }}
            </button>
        </form>
</div>
</x-guest-layout>