<x-guest-layout>
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Crea tu cuenta</h2>
        <p class="text-gray-600 dark:text-gray-400 text-sm mt-1">Únete a nosotros en pocos pasos</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-5">
        @csrf

        <div>
            <x-input-label for="name" :value="__('Nombre Completo')"/>
            <x-text-input id="name" class="block mt-2 w-full px-4 py-2 border-2 border-primary-400 dark:border-primary-500 rounded-lg focus:ring-2 focus:ring-primary-500 dark:focus:ring-primary-500 focus:border-primary-500 dark:focus:border-primary-600 dark:bg-slate-700 dark:text-white transition" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Tu nombre" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Correo Electrónico')"/>
            <x-text-input id="email" class="block mt-2 w-full px-4 py-2 border-2 border-primary-400 dark:border-primary-500 rounded-lg focus:ring-2 focus:ring-primary-500 dark:focus:ring-primary-500 focus:border-primary-500 dark:focus:border-primary-600 dark:bg-slate-700 dark:text-white transition" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="tu@email.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="password" :value="__('Contraseña')"/>

            <x-text-input id="password" class="block mt-2 w-full px-4 py-2 border-2 border-primary-300 dark:border-primary-500 rounded-lg focus:ring-2 focus:ring-primary-500 dark:focus:ring-primary-500 focus:border-primary-500 dark:focus:border-primary-600 dark:bg-slate-700 dark:text-white transition"
                            type="password"
                            name="password"
                            required autocomplete="new-password" placeholder="Mínimo 8 caracteres" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="password_confirmation" :value="__('Confirmar Contraseña')"/>

            <x-text-input id="password_confirmation" class="block mt-2 w-full px-4 py-2 border-2 border-primary-300 dark:border-primary-500 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 dark:focus:ring-primary-500 dark:focus:border-primary-600 dark:bg-slate-700 dark:text-white transition"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" placeholder="Repite tu contraseña" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <button type="submit" class="w-full bg-primary-600 hover:bg-primary-700 dark:bg-primary-600 dark:hover:bg-primary-700 text-white font-semibold py-2.5 px-4 rounded-lg transition duration-200 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 dark:focus:ring-offset-slate-800">
            {{ __('Crear cuenta') }}
        </button>

        <p class="text-center text-gray-600 dark:text-gray-400 text-sm">
            ¿Ya tienes cuenta?
            <a href="{{ route('login') }}" class="text-primary-600 dark:text-primary-400 hover:text-primary-800 dark:hover:text-primary-300 font-semibold transition">
                Inicia sesión
            </a>
        </p>
    </form>
</x-guest-layout>
