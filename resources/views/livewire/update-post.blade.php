<div class="p-6">
    <h2 class="mb-4 text-lg font-medium">Edit Post</h2>

    <form wire:submit.prevent="update">
        <div class="mb-4">
            <textarea
                wire:model="content"
                class="w-full p-4 overflow-y-auto border border-gray-300 rounded-lg shadow-sm bg-background-light dark:bg-background-dark focus:ring focus:ring-primary/20 focus:border-primary dark:focus:border-primary md:p-6 max-h-96 min-h-40"
                rows="4"
                placeholder="What's on your mind?"
            ></textarea>
            @error('content') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
        </div>

        @if($image)
            <div class="mb-4">
                <div class="relative">
                    <img src="{{ asset('storage/' . $image) }}" alt="Current post image" class="h-auto max-w-full rounded">

                    <button
                        type="button"
                        wire:click="deleteImage"
                        class="absolute p-2 text-white bg-red-500 rounded-full top-2 right-2"
                        title="Remove image"
                    >
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </div>
        @endif

        <div class="mb-4">
            <input
                type="file"
                wire:model="newImage"
                class="w-full"
                accept="image/*"
            >
            @error('newImage') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="flex justify-end space-x-3">
            <x-button
                type="button"
                x-data
                @click="show = false"
                class="bg-gray-200 text-text-light"
            >
                Cancel
            </x-button>

            <x-button
                type="submit"
                class="text-white bg-blue-600"
                wire:loading.attr="disabled"
            >
                Update
            </x-button>
        </div>
    </form>
</div>
