<script setup>
import { ref } from "vue";
const isDarkModeEnabled = ref(false);
</script>
<template>

    <Head title="Error 429" />
    <div class="min-h-100vh flex grow bg-slate-50 dark:bg-navy-900">
        <!-- Main Content Wrapper -->
        <main class="grid w-full grow grid-cols-1 place-items-center">
            <div class="max-w-md p-6 text-center">
                <div class="w-full">
                    <img class="w-full" v-if="isDarkModeEnabled" src="images/illustrations/error-429.svg" alt="image" />
                    <img class="w-full" v-else src="images/illustrations/error-429-dark.svg" alt="image" />
                </div>
                <p class="pt-4 text-7xl font-bold text-primary dark:text-accent">
                    429
                </p>
                <p class="pt-4 text-xl font-semibold text-slate-800 dark:text-navy-50">
                    Too many requests
                </p>
                <p class="pt-2 text-slate-500 dark:text-navy-200">
                    The user has send too many requests in a given amount of time.
                    Intended for use with rate limiting schemas
                </p>
            </div>
        </main>
    </div>
</template>
