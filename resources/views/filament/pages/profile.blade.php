<x-filament::page>
    @php
        $user = $this->getUser();
    @endphp

    <div class="max-w-5xl">
        <!-- Header -->
        <div class="mb-8">
            <div class="flex items-center gap-6">
                <div class="w-20 h-20 rounded-full bg-gradient-to-br from-primary-500 to-primary-700 flex items-center justify-center flex-shrink-0">
                    <span class="text-4xl font-bold text-white">{{ substr($user->name, 0, 1) }}</span>
                </div>
                <div>
                    <h1 class="text-3xl font-bold text-gray-900 dark:text-white">{{ $user->name }}</h1>
                    <p class="text-gray-600 dark:text-gray-400 mt-1">{{ $user->email }}</p>
                </div>
            </div>
        </div>

        <!-- Profile Information Card -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 mb-8">
            <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900/50">
                <h2 class="text-xl font-bold text-gray-900 dark:text-white">Información de Perfil</h2>
                <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Actualiza los detalles de tu cuenta</p>
            </div>

            <form id="send-verification" method="post" action="{{ route('verification.send') }}" class="hidden">
                @csrf
            </form>

            <form method="post" action="{{ route('profile.update') }}" class="px-6 py-6">
                @csrf
                @method('patch')

                <div class="space-y-6">
                    <div>
                        <label for="name" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            Nombre Completo
                        </label>
                        <input
                            id="name"
                            name="name"
                            type="text"
                            value="{{ old('name', $user->name) }}"
                            class="w-full px-4 py-2.5 border-2 border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:border-primary-500 focus:ring-2 focus:ring-primary-100 dark:focus:ring-primary-900 dark:bg-gray-700 dark:text-white transition"
                            required
                        />
                        @error('name')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            Correo Electrónico
                        </label>
                        <input
                            id="email"
                            name="email"
                            type="email"
                            value="{{ old('email', $user->email) }}"
                            class="w-full px-4 py-2.5 border-2 border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:border-primary-500 focus:ring-2 focus:ring-primary-100 dark:focus:ring-primary-900 dark:bg-gray-700 dark:text-white transition"
                            required
                        />
                        @error('email')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror

                        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                            <div class="mt-3 p-4 bg-yellow-50 dark:bg-yellow-900/30 border-l-4 border-yellow-400 rounded">
                                <p class="text-sm text-yellow-800 dark:text-yellow-200 mb-2">
                                    Tu correo no ha sido verificado
                                </p>
                                <button
                                    form="send-verification"
                                    type="submit"
                                    class="text-sm font-medium text-yellow-600 dark:text-yellow-400 hover:underline"
                                >
                                    Reenviar correo de verificación
                                </button>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="flex items-center justify-between mt-8 pt-6 border-t border-gray-200 dark:border-gray-700">
                    <button
                        type="submit"
                        class="px-6 py-2.5 bg-primary-600 hover:bg-primary-700 text-white font-semibold rounded-lg shadow-sm hover:shadow-md transition"
                    >
                        Guardar Cambios
                    </button>

                    @if (session('status') === 'profile-updated')
                        <p class="text-sm font-semibold text-green-600 dark:text-green-400">
                            ✓ Cambios guardados
                        </p>
                    @endif
                </div>
            </form>
        </div>

        <!-- Password Card -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 mb-8">
            <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900/50">
                <h2 class="text-xl font-bold text-gray-900 dark:text-white">Cambiar Contraseña</h2>
                <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Mantén tu cuenta segura</p>
            </div>

            <form method="post" action="{{ route('password.update') }}" class="px-6 py-6">
                @csrf
                @method('put')

                <div class="space-y-6">
                    <div>
                        <label for="current_password" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            Contraseña Actual
                        </label>
                        <input
                            id="current_password"
                            name="current_password"
                            type="password"
                            class="w-full px-4 py-2.5 border-2 border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:border-primary-500 focus:ring-2 focus:ring-primary-100 dark:focus:ring-primary-900 dark:bg-gray-700 dark:text-white transition"
                            autocomplete="current-password"
                        />
                        @error('current_password', 'updatePassword')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            Nueva Contraseña
                        </label>
                        <input
                            id="password"
                            name="password"
                            type="password"
                            class="w-full px-4 py-2.5 border-2 border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:border-primary-500 focus:ring-2 focus:ring-primary-100 dark:focus:ring-primary-900 dark:bg-gray-700 dark:text-white transition"
                            autocomplete="new-password"
                        />
                        @error('password', 'updatePassword')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            Confirmar Nueva Contraseña
                        </label>
                        <input
                            id="password_confirmation"
                            name="password_confirmation"
                            type="password"
                            class="w-full px-4 py-2.5 border-2 border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:border-primary-500 focus:ring-2 focus:ring-primary-100 dark:focus:ring-primary-900 dark:bg-gray-700 dark:text-white transition"
                            autocomplete="new-password"
                        />
                        @error('password_confirmation', 'updatePassword')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex items-center justify-between mt-8 pt-6 border-t border-gray-200 dark:border-gray-700">
                    <button
                        type="submit"
                        class="px-6 py-2.5 bg-primary-600 hover:bg-primary-700 text-white font-semibold rounded-lg shadow-sm hover:shadow-md transition"
                    >
                        Actualizar Contraseña
                    </button>

                    @if (session('status') === 'password-updated')
                        <p class="text-sm font-semibold text-green-600 dark:text-green-400">
                            ✓ Contraseña actualizada
                        </p>
                    @endif
                </div>
            </form>
        </div>

    </div>
</x-filament::page>
