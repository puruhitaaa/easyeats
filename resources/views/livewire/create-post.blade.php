<div class="p-6">
    <h2 class="text-lg font-medium mb-4">Create Post</h2>

    <form wire:submit.prevent="save">
        <div class="mb-4">
            <textarea
                wire:model="content"
                class="w-full rounded-lg border border-gray-300 bg-background-light dark:bg-background-dark shadow-sm focus:ring focus:ring-primary/20 focus:border-primary dark:focus:border-primary p-4 md:p-6 max-h-96 overflow-y-auto min-h-40"
                rows="4"
                placeholder="What's on your mind?"
            ></textarea>
            @error('content') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <input
                type="file"
                wire:model="image"
                class="w-full"
                accept="image/*"
            >
            @error('image') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
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
                class="bg-blue-600 text-white"
                wire:loading.attr="disabled"
            >
                Post
            </x-button>
        </div>
    </form>
</div>
