<div
    x-data="{
        show: false,
        message: '',
        type: 'success',
        icons: {
            success: `<svg xmlns='http://www.w3.org/2000/svg' class='h-5 w-5' viewBox='0 0 20 20' fill='currentColor'>
                <path fill-rule='evenodd' d='M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z' clip-rule='evenodd' />
            </svg>`,
            error: `<svg xmlns='http://www.w3.org/2000/svg' class='h-5 w-5' viewBox='0 0 20 20' fill='currentColor'>
                <path fill-rule='evenodd' d='M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z' clip-rule='evenodd' />
            </svg>`,
            warning: `<svg xmlns='http://www.w3.org/2000/svg' class='h-5 w-5' viewBox='0 0 20 20' fill='currentColor'>
                <path fill-rule='evenodd' d='M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z' clip-rule='evenodd' />
            </svg>`
        }
    }"
    x-on:toast.window="
        show = true;
        message = $event.detail.message;
        type = $event.detail.type || 'success';
        setTimeout(() => show = false, $event.detail.timeout || 3000);
    "
    class="fixed bottom-4 right-4 z-50"
    x-show="show"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 transform translate-y-2"
    x-transition:enter-end="opacity-100 transform translate-y-0"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100 transform translate-y-0"
    x-transition:leave-end="opacity-0 transform translate-y-2"
>
    <div
        :class="{
            'bg-green-50 text-green-800 dark:bg-green-800/20 dark:text-green-300': type === 'success',
            'bg-red-50 text-red-800 dark:bg-red-800/20 dark:text-red-300': type === 'error',
            'bg-yellow-50 text-yellow-800 dark:bg-yellow-800/20 dark:text-yellow-300': type === 'warning'
        }"
        class="rounded-lg p-4 shadow-lg flex items-center space-x-3"
    >
        <div
            :class="{
                'text-green-400 dark:text-green-300': type === 'success',
                'text-red-400 dark:text-red-300': type === 'error',
                'text-yellow-400 dark:text-yellow-300': type === 'warning'
            }"
            x-html="icons[type]"
        ></div>
        <p class="font-medium" x-text="message"></p>
        <button
            @click="show = false"
            class="ml-auto -mx-1.5 -my-1.5 rounded-lg focus:ring-2 p-1.5 inline-flex h-8 w-8 hover:bg-black/10 dark:hover:bg-white/10"
        >
            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>
</div>
