@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'text-base rounded-xl py-3 px-4 border border-gray-200 dark:border-gray-700 shadow-sm
                    bg-white dark:bg-background-dark text-text-light dark:text-text-dark
                    placeholder-gray-400 dark:placeholder-gray-500
                    focus:ring-2 focus:ring-primary/20 focus:border-primary dark:focus:border-primary
                    transition-colors duration-200']) !!}>
