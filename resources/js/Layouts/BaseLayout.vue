<script setup>
import { ref } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import Banner from '@/Components/Banner.vue';

defineProps({
    title: String,
});

const logout = () => {
    Inertia.post(route('logout'));
};
</script>

<template>
    <div>

        <Head :title="title" />

        <Banner />

        <div class="min-h-100vh flex grow bg-slate-50 dark:bg-navy-900">

            <!-- Page Content -->
            <main>
                <slot />
            </main>
        </div>


    </div>
</template>
