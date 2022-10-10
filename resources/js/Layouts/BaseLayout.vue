<script setup>
import Banner from '@/Components/Banner.vue';
import { usePage } from '@inertiajs/inertia-vue3'

defineProps({
    title: String,
});
//Setup Language
document.documentElement.setAttribute('lang', usePage().props.value.locale['code'])
//Setup direction
if (usePage().props.value.locale['is_rtl'] === 1) {
    document.documentElement.setAttribute('dir', 'rtl')
} else {
    document.documentElement.setAttribute('dir', 'ltr')
}
//Setup monochrome
if (localStorage.getItem('is-monochrome') === "true") {
    document.body.classList.add('is-monochrome')
} else {
    document.body.classList.remove('is-monochrome')
}

</script>

<template>
    <div>

        <Head :title="title" />

        <Banner />
        <div class="min-h-100vh flex grow bg-slate-50 dark:bg-navy-900">
            <!-- Page Content -->
            <slot />
        </div>


    </div>
</template>
