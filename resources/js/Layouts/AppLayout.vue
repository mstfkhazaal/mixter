<script setup>
import { ref } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import Banner from '@/Components/Banner.vue';
import MainSidebar from '@/Layouts/Partials/MainSidebar.vue';
import SidebarPanel from '@/Layouts/Partials/SidebarPanel.vue';
import Header from '@/Layouts/Partials/Header.vue';
import MobileSearchbar from '@/Layouts/Partials/MobileSearchbar.vue';
import RightSidebar from '@/Layouts/Partials/RightSidebar.vue';


defineProps({
    title: String,
});

const isSidebarOpen = ref(true);
const isHeaderBlur = ref(true);
const hasMinSidebar = ref(true);

const logout = () => {
    Inertia.post(route('logout'));
};
</script>

<template>
    <div :class="{
    'is-header-blur': isHeaderBlur,
    'is-sidebar-open': isSidebarOpen,
    'has-min-sidebar': hasMinSidebar
    }">

        <Head :title="title" />
        <!-- Page Heading
        <header v-if="$slots.header" class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <slot name="header" />
            </div>
        </header>-->


        <Banner />
        <!-- Page Wrapper -->
        <div class="min-h-100vh flex grow bg-slate-50 dark:bg-navy-900">
            <!-- Sidebar -->
            <div class="sidebar print:hidden">
                <!-- Main Sidebar
                <MainSidebar></MainSidebar>-->

                <!-- Sidebar Panel
                <SidebarPanel></SidebarPanel>-->
            </div>

            <!-- App Header -->
            <Header></Header>

            <!-- Mobile Searchbar
            <MobileSearchbar></MobileSearchbar>-->

            <!-- Right Sidebar
            <RightSidebar></RightSidebar> -->

            <!-- Page Content -->
            <main>
                <slot />
            </main>
        </div>
    </div>
</template>
