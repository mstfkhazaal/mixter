<script setup>
import { ref, computed } from "vue";
import { Inertia } from '@inertiajs/inertia';
import { usePage } from '@inertiajs/inertia-vue3'
import Popover from '@/Components/Popover.vue';
const isRTL = computed(() => usePage().props.value.locale['is_rtl'] === 1);
const isSidebarExpanded = ref(true);
const isSearchbarActive = ref(true);
const smAndUp = ref(true);
const logout = () => {
    Inertia.post(route('logout'));
};


</script>
<template>
    <div :class="isRTL?'main-sidebar-rtl':'main-sidebar'">
        <div
            class="flex h-full w-full flex-col items-center border-r border-slate-150 bg-white dark:border-navy-700 dark:bg-navy-800">
            <!-- Application Logo -->
            <div class="flex pt-4">

                <Link :href="route('dashboard')">

                <img class="h-11 w-11 transition-transform duration-500 ease-in-out hover:rotate-[360deg]"
                    src="/images/app-logo.svg" alt="logo" />

                </Link>
            </div>

            <!-- Main Sections Links -->
            <div class="is-scrollbar-hidden flex grow flex-col space-y-4 overflow-y-auto pt-6">
                <!-- Dashobards -->
                <Link href="#"
                    class="flex h-11 w-11 items-center justify-center rounded-lg outline-none transition-colors duration-200 "
                    :class="routePrefix === 'dashboards' ? 'hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:bg-navy-600 bg-primary/10 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90' : 'hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25'">
                <svg class="h-6 w-6" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M5 14.0585C5 13.0494 5 12.5448 5.22166 12.1141C5.44333 11.6833 5.8539 11.3901 6.67505 10.8035L10.8375 7.83034C11.3989 7.42938 11.6795 7.2289 12 7.2289C12.3205 7.2289 12.6011 7.42938 13.1625 7.83034L17.325 10.8035C18.1461 11.3901 18.5567 11.6833 18.7783 12.1141C19 12.5448 19 13.0494 19 14.0585V19C19 19.9428 19 20.4142 18.7071 20.7071C18.4142 21 17.9428 21 17 21H7C6.05719 21 5.58579 21 5.29289 20.7071C5 20.4142 5 19.9428 5 19V14.0585Z"
                        fill-opacity="0.3" class="fill-slate-500 dark:fill-navy-200"
                        :class="routePrefix === 'dashboards' ? 'fill-primary dark:fill-accent' : 'fill-slate-500 dark:fill-navy-200' " />
                    <path
                        d="M3 12.3866C3 12.6535 3 12.7869 3.0841 12.8281C3.16819 12.8692 3.27352 12.7873 3.48418 12.6234L10.7721 6.95502C11.362 6.49625 11.6569 6.26686 12 6.26686C12.3431 6.26686 12.638 6.49625 13.2279 6.95502L20.5158 12.6234C20.7265 12.7873 20.8318 12.8692 20.9159 12.8281C21 12.7869 21 12.6535 21 12.3866V11.9782C21 11.4978 21 11.2576 20.8983 11.0497C20.7966 10.8418 20.607 10.6944 20.2279 10.3995L13.2279 4.95502C12.638 4.49625 12.3431 4.26686 12 4.26686C11.6569 4.26686 11.362 4.49625 10.7721 4.95502L3.77212 10.3995C3.39295 10.6944 3.20337 10.8418 3.10168 11.0497C3 11.2576 3 11.4978 3 11.9782V12.3866Z"
                        :class="routePrefix === 'dashboards' ? 'fill-primary dark:fill-accent' : 'fill-slate-500 dark:fill-navy-200'" />
                    <path
                        d="M12.5 15H11.5C10.3954 15 9.5 15.8954 9.5 17V20.85C9.5 20.9328 9.56716 21 9.65 21H14.35C14.4328 21 14.5 20.9328 14.5 20.85V17C14.5 15.8954 13.6046 15 12.5 15Z"
                        :class="routePrefix === 'dashboards' ? 'fill-primary dark:fill-accent' : 'fill-slate-500 dark:fill-navy-200' " />
                    <rect x="16" y="5" width="2" height="4" rx="0.5"
                        :class="routePrefix === 'dashboards' ? 'fill-primary dark:fill-accent' : 'fill-slate-500 dark:fill-navy-200'  " />
                </svg>
                </Link>

                <!-- Add -->
                <Link href="#"
                    class="flex h-11 w-11 items-center justify-center rounded-lg outline-none transition-colors duration-200 "
                    :class="routePrefix === 'apps' ? 'hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:bg-navy-600 bg-primary/10 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90' : 'hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25'">
                <svg class="h-6 w-6" viewBox="0 0 120 120 " fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-opacity="0.3" class="fill-slate-500 dark:fill-navy-200"
                        :class="routePrefix === 'apps' ? 'fill-primary dark:fill-accent' : 'fill-slate-500 dark:fill-navy-200' "
                        d="M108.993,47.079c7.683-0.059,13.898,6.12,13.882,13.805 c-0.018,7.683-6.26,13.959-13.942,14.019L75.24,75.138l-0.235,33.73c-0.063,7.619-6.338,13.789-14.014,13.78 c-7.678-0.01-13.848-6.197-13.785-13.818l0.233-33.497l-33.558,0.235C6.2,75.628-0.016,69.448,0,61.764 c0.018-7.683,6.261-13.959,13.943-14.018l33.692-0.236l0.236-33.73C47.935,6.161,54.209-0.009,61.885,0 c7.678,0.009,13.848,6.197,13.784,13.818l-0.233,33.497L108.993,47.079L108.993,47.079z" />
                </svg>
                </Link>

            </div>

            <!-- Bottom Links -->
            <div class="flex flex-col items-center space-y-3 py-3">
                <!-- Settings -->
                <Link href="/"
                    class="flex h-11 w-11 items-center justify-center rounded-lg outline-none transition-colors duration-200 hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                <svg class="h-6 w-6" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path class="fill-slate-500 dark:fill-navy-200" fill-opacity="0.3" fill="currentColor"
                        d="M2 12.947v-1.771c0-1.047.85-1.913 1.899-1.913 1.81 0 2.549-1.288 1.64-2.868a1.919 1.919 0 0 1 .699-2.607l1.729-.996c.79-.474 1.81-.192 2.279.603l.11.192c.9 1.58 2.379 1.58 3.288 0l.11-.192c.47-.795 1.49-1.077 2.279-.603l1.73.996a1.92 1.92 0 0 1 .699 2.607c-.91 1.58-.17 2.868 1.639 2.868 1.04 0 1.899.856 1.899 1.912v1.772c0 1.047-.85 1.912-1.9 1.912-1.808 0-2.548 1.288-1.638 2.869.52.915.21 2.083-.7 2.606l-1.729.997c-.79.473-1.81.191-2.279-.604l-.11-.191c-.9-1.58-2.379-1.58-3.288 0l-.11.19c-.47.796-1.49 1.078-2.279.605l-1.73-.997a1.919 1.919 0 0 1-.699-2.606c.91-1.58.17-2.869-1.639-2.869A1.911 1.911 0 0 1 2 12.947Z" />
                    <path class="fill-slate-500 dark:fill-navy-200" fill="currentColor"
                        d="M11.995 15.332c1.794 0 3.248-1.464 3.248-3.27 0-1.807-1.454-3.272-3.248-3.272-1.794 0-3.248 1.465-3.248 3.271 0 1.807 1.454 3.271 3.248 3.271Z" />
                </svg>
                </Link>
                <!-- Profile-->
                <Popover>
                    <button class="avatar h-12 w-12">
                        <svg version="1.1" v-if="$page.props.user.profile_photo_path ==null"
                            class="fill-slate-400 dark:fill-navy-200" fill="currentColor"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                            y="0px" viewBox="0 0 22 22" style="enable-background:new 0 0 24 24;" xml:space="preserve">
                            <g>
                                <g transform="translate(-1306.000000, -24.000000)">
                                    <path class="st0" d="M1318,26c-5.5,0-10,4.5-10,10s4.5,10,10,10s10-4.5,10-10S1323.5,26,1318,26z M1318,30.6
			c1.8,0,3.3,1.5,3.3,3.4s-1.5,3.4-3.3,3.4s-3.3-1.5-3.3-3.4S1316.2,30.6,1318,30.6z M1318,44.9c-2.3,0-4.5-0.9-6.2-2.5
			c1.7-2.3,3.9-3.5,6.2-3.5s4.5,1.2,6.2,3.5C1322.5,44,1320.3,44.9,1318,44.9z" />
                                </g>
                            </g>
                        </svg>
                        <img class="rounded-full" :src="$page.props.user.profile_photo_path" v-else alt="avatar" />

                    </button>

                    <template #header>
                        <div class="avatar h-14 w-14">
                            <svg version="1.1" v-if="$page.props.user.profile_photo_path ==null"
                                class="fill-slate-400 dark:fill-navy-200" fill="currentColor"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                y="0px" viewBox="0 0 22 22" style="enable-background:new 0 0 24 24;"
                                xml:space="preserve">
                                <g>
                                    <g transform="translate(-1306.000000, -24.000000)">
                                        <path class="st0" d="M1318,26c-5.5,0-10,4.5-10,10s4.5,10,10,10s10-4.5,10-10S1323.5,26,1318,26z M1318,30.6
			c1.8,0,3.3,1.5,3.3,3.4s-1.5,3.4-3.3,3.4s-3.3-1.5-3.3-3.4S1316.2,30.6,1318,30.6z M1318,44.9c-2.3,0-4.5-0.9-6.2-2.5
			c1.7-2.3,3.9-3.5,6.2-3.5s4.5,1.2,6.2,3.5C1322.5,44,1320.3,44.9,1318,44.9z" />
                                    </g>
                                </g>
                            </svg>
                            <img class="rounded-full" :src="$page.props.user.profile_photo_path" v-else alt="avatar" />
                        </div>
                        <div>
                            <a href="#"
                                class="text-base font-medium text-slate-700 hover:text-primary focus:text-primary dark:text-navy-100 dark:hover:text-accent-light dark:focus:text-accent-light">
                                {{ $page.props.user.name}}
                            </a>
                            <p class="text-xs text-slate-400 dark:text-navy-300">
                                {{ $page.props.user.email}}
                            </p>
                        </div>
                    </template>
                    <template #content>
                        <div class="flex flex-col pt-2 pb-5">
                            <a href="#" :class="{'space-x-reverse':isRTL}" class=" group flex items-center space-x-3 py-2 px-4 tracking-wide outline-none
                                        transition-all hover:bg-slate-100 focus:bg-slate-100 dark:hover:bg-navy-600
                                        dark:focus:bg-navy-600">
                                <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-warning text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                        viewbox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </div>
                                <Link :href="route('profile.show')">
                                <div>
                                    <h2
                                        class="font-medium text-slate-700 transition-colors group-hover:text-primary group-focus:text-primary dark:text-navy-100 dark:group-hover:text-accent-light dark:group-focus:text-accent-light">
                                        {{__('profile.profile.title')}}
                                    </h2>
                                    <div class="text-xs text-slate-400 line-clamp-1 dark:text-navy-300">
                                        {{__('profile.profile.subtitle')}}
                                    </div>
                                </div>
                                </Link>

                            </a>
                            <a href="#" :class="{'space-x-reverse':isRTL}"
                                class="group flex items-center space-x-3 py-2 px-4 tracking-wide outline-none transition-all hover:bg-slate-100 focus:bg-slate-100 dark:hover:bg-navy-600 dark:focus:bg-navy-600">
                                <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-info text-white">

                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="-185 -120 740 740">
                                        <path fill="white"
                                            d="M14 2.2C22.5-1.7 32.5-.3 39.6 5.8L80 40.4 120.4 5.8c9-7.7 22.3-7.7 31.2 0L192 40.4 232.4 5.8c9-7.7 22.2-7.7 31.2 0L304 40.4 344.4 5.8c7.1-6.1 17.1-7.5 25.6-3.6s14 12.4 14 21.8V488c0 9.4-5.5 17.9-14 21.8s-18.5 2.5-25.6-3.6L304 471.6l-40.4 34.6c-9 7.7-22.2 7.7-31.2 0L192 471.6l-40.4 34.6c-9 7.7-22.3 7.7-31.2 0L80 471.6 39.6 506.2c-7.1 6.1-17.1 7.5-25.6 3.6S0 497.4 0 488V24C0 14.6 5.5 6.1 14 2.2zM96 144c-8.8 0-16 7.2-16 16s7.2 16 16 16H288c8.8 0 16-7.2 16-16s-7.2-16-16-16H96zM80 352c0 8.8 7.2 16 16 16H288c8.8 0 16-7.2 16-16s-7.2-16-16-16H96c-8.8 0-16 7.2-16 16zM96 240c-8.8 0-16 7.2-16 16s7.2 16 16 16H288c8.8 0 16-7.2 16-16s-7.2-16-16-16H96z" />
                                    </svg>
                                </div>
                                <div>
                                    <h2
                                        class="font-medium text-slate-700 transition-colors group-hover:text-primary group-focus:text-primary dark:text-navy-100 dark:group-hover:text-accent-light dark:group-focus:text-accent-light">
                                        {{__('profile.subscription.title')}}
                                    </h2>
                                    <div class="text-xs text-slate-400 line-clamp-1 dark:text-navy-300">
                                        {{__('profile.subscription.subtitle')}}
                                    </div>
                                </div>
                            </a>
                            <a href="#" :class="{'space-x-reverse':isRTL}"
                                class="group flex items-center space-x-3 py-2 px-4 tracking-wide outline-none transition-all hover:bg-slate-100 focus:bg-slate-100 dark:hover:bg-navy-600 dark:focus:bg-navy-600">
                                <div
                                    class="flex h-8 w-8 items-center justify-center rounded-lg bg-secondary text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="-95 -120 740 740">
                                        <path fill="white"
                                            d="M64 64C28.7 64 0 92.7 0 128v80c26.5 0 48 21.5 48 48s-21.5 48-48 48v80c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V304c-26.5 0-48-21.5-48-48s21.5-48 48-48V128c0-35.3-28.7-64-64-64H64zm64 96l0 192H448V160H128zm-32 0c0-17.7 14.3-32 32-32H448c17.7 0 32 14.3 32 32V352c0 17.7-14.3 32-32 32H128c-17.7 0-32-14.3-32-32V160z" />
                                    </svg>
                                </div>

                                <div>
                                    <h2
                                        class="font-medium text-slate-700 transition-colors group-hover:text-primary group-focus:text-primary dark:text-navy-100 dark:group-hover:text-accent-light dark:group-focus:text-accent-light">
                                        {{__('profile.ticket.title')}}
                                    </h2>
                                    <div class="text-xs text-slate-400 line-clamp-1 dark:text-navy-300">
                                        {{__('profile.ticket.subtitle')}}
                                    </div>
                                </div>
                            </a>
                            <div class="mt-3 px-4">
                                <form @submit.prevent="logout">
                                    <button type="submit" :class="{'space-x-reverse':isRTL}"
                                        class="btn h-9 w-full space-x-2 bg-primary text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewbox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                        </svg>
                                        <span>{{__('profile.logout')}}</span>
                                    </button>
                                </form>

                            </div>
                        </div>
                    </template>
                </Popover>



            </div>
        </div>
    </div>
</template>
