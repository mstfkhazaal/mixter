<script setup>
import { ref } from "vue";
const isDarkModeEnabled = ref(true);
</script>
<template>

    <Head title="Error 401" />
    <div class="min-h-100vh flex grow bg-slate-50 dark:bg-navy-900">
        <!-- Main Content Wrapper -->
        <main class="grid w-full grow grid-cols-1 place-items-center">
            <div class="max-w-md p-6 text-center">
                <div class="w-full">
                    <img class="w-full" src="images/illustrations/error-401.svg" alt="image" />
                </div>
                <p class="pt-4 text-7xl font-bold text-primary dark:text-accent">
                    401
                </p>
                <p class="pt-4 text-xl font-semibold text-slate-800 dark:text-navy-50">
                    You are not authorized
                </p>
                <p class="pt-2 text-slate-500 dark:text-navy-200">
                    Sorry, You are missing the required rights to be able to access this page.
                </p>

                <Link href="/"
                    class="btn mt-8 h-11 bg-primary text-base font-medium text-white hover:bg-primary-focus hover:shadow-lg hover:shadow-primary/50 focus:bg-primary-focus focus:shadow-lg focus:shadow-primary/50 active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:hover:shadow-accent/50 dark:focus:bg-accent-focus dark:focus:shadow-accent/50 dark:active:bg-accent/90">
                Back To Home
                </Link>
            </div>
        </main>
    </div>
</template>
