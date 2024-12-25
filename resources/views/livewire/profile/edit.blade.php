<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 border rounded-lg shadow-md bg-background-light dark:bg-background-dark group dark:border-gray-700">
            <div class="max-w-xl">
                <header>
                    <h2 class="text-lg font-medium text-text-light dark:text-text-dark">
                        Profile Information
                    </h2>
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                        Update your account's profile information and email address.
                    </p>
                </header>

                <form wire:submit="updateProfile" class="mt-6 space-y-6">
                    <div>
                        <div class="flex items-center gap-x-3">
                            @if ($image)
                                <img class="h-12 w-12 rounded-full object-cover" src="{{ $image->temporaryUrl() }}" alt="Profile photo">
                            @elseif(auth()->user()->image)
                                <img class="h-12 w-12 rounded-full object-cover" src="{{ Storage::url(auth()->user()->image) }}" alt="Profile photo">
                            @else
                                <span class="h-12 w-12 rounded-full bg-gray-200 flex items-center justify-center">
                                    <span class="text-gray-500 text-sm">{{ substr(auth()->user()->name, 0, 1) }}</span>
                                </span>
                            @endif

                            <label for="image" class="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                                Change
                            </label>
                            <input type="file" wire:model="image" id="image" class="hidden">
                        </div>
                        @error('image') <span class="mt-2 text-sm text-red-600">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <x-input-label for="name" value="Name" />
                        <x-text-input wire:model="name" id="name" type="text" class="mt-1 block w-full" required autofocus autocomplete="name" />
                        @error('name') <span class="mt-2 text-sm text-red-600">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <x-input-label for="email" value="Email" />
                        <x-text-input wire:model="email" id="email" type="email" class="mt-1 block w-full" required autocomplete="username" />
                        @error('email') <span class="mt-2 text-sm text-red-600">{{ $message }}</span> @enderror
                    </div>

                    <div class="flex items-center gap-4">
                        <x-primary-button>Save</x-primary-button>

                        <x-action-message class="mr-3" on="profile-updated">
                            Saved.
                        </x-action-message>
                    </div>
                </form>
            </div>
        </div>

        <div class="p-4 sm:p-8 border rounded-lg shadow-md bg-background-light dark:bg-background-dark group dark:border-gray-700">
            <div class="max-w-xl">
                <header>
                    <h2 class="text-lg font-medium text-text-light dark:text-text-dark">
                        Update Password
                    </h2>
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                        Ensure your account is using a long, random password to stay secure.
                    </p>
                </header>

                <form wire:submit="updatePassword" class="mt-6 space-y-6">
                    <div>
                        <x-input-label for="current_password" value="Current Password" />
                        <x-text-input wire:model="current_password" id="current_password" type="password" class="mt-1 block w-full" autocomplete="current-password" />
                        @error('current_password') <span class="mt-2 text-sm text-red-600">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <x-input-label for="password" value="New Password" />
                        <x-text-input wire:model="password" id="password" type="password" class="mt-1 block w-full" autocomplete="new-password" />
                        @error('password') <span class="mt-2 text-sm text-red-600">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <x-input-label for="password_confirmation" value="Confirm Password" />
                        <x-text-input wire:model="password_confirmation" id="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" />
                        @error('password_confirmation') <span class="mt-2 text-sm text-red-600">{{ $message }}</span> @enderror
                    </div>

                    <div class="flex items-center gap-4">
                        <x-primary-button>Save</x-primary-button>

                        <x-action-message class="mr-3" on="password-updated">
                            Saved.
                        </x-action-message>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
