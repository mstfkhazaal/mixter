<script setup>
import { useForm } from '@inertiajs/inertia-vue3';
import { ref, computed, watch } from "vue";
import BaseLayout from '@/Layouts/BaseLayout.vue';
import { usePage } from '@inertiajs/inertia-vue3'
import { useDark, useToggle } from '@vueuse/core';

const isDark = useDark();
const toggleDark = useToggle(isDark);

const isRTL = computed(() => usePage().props.value.locale['is_rtl'] === 1)

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.transform(data => ({
        ...data,
        remember: form.remember ? 'on' : '',
    })).post(route('login'), {
        // onFinish: () => form.reset('password'),
    });
};

//
</script>

<template>
    <BaseLayout title="Log in">
        <div class="fixed top-0 hidden p-6 lg:block lg:px-12">
            <a href="#" class="flex items-center space-x-2" :class="{'space-x-reverse':isRTL}">
                <img class="h-12 w-12" src="images/app-logo.svg" alt="logo" />
                <p class="text-xl font-semibold uppercase text-slate-700 dark:text-navy-100">
                    Mixter
                </p>
            </a>
        </div>

        <div class="hidden w-full place-items-center lg:grid">
            <div class="w-full max-w-lg p-6">
                <img class="w-full" v-if="isDark" src="images/illustrations/dashboard-check.svg" alt="image" />
                <img class="w-full" v-else src="images/illustrations/dashboard-check-dark.svg" alt="image" />
            </div>
        </div>
        <main class="flex w-full flex-col items-center bg-white dark:bg-navy-700 lg:max-w-md">
            <div class="flex w-full max-w-sm grow flex-col justify-center p-5">
                <div class="text-center">
                    <img class="mx-auto h-16 w-16 lg:hidden" src="images/app-logo.svg" alt="logo" />
                    <div class="mt-4">
                        <h2 class="text-2xl font-semibold text-slate-600 dark:text-navy-100">
                            {{__('login.title')}}
                        </h2>
                        <p class="text-slate-400 dark:text-navy-300">
                            {{__('login.subtitle')}}
                        </p>
                    </div>
                </div>
                <form class="mt-16" @submit.prevent="submit">
                    <div>
                        <label class="relative flex">
                            <input :class="[isRTL?'pr-9':'pl-9']"
                                class="form-input border-transparent
                                focus:border-transparent
                                peer w-full rounded-lg bg-slate-150 px-3 py-2
                                 ring-primary/50 placeholder:text-slate-400 hover:bg-slate-200 focus:ring dark:bg-navy-900/90 dark:ring-accent/50 dark:placeholder:text-navy-300 dark:hover:bg-navy-900 dark:focus:bg-navy-900"
                                :placeholder="__('login.email')" type="email" name="email" required autofocus
                                v-model="form.email" />
                            <span
                                class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 transition-colors duration-200"
                                    fill="none" viewbox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </span>
                        </label>
                        <span class="text-tiny+ text-error" v-if="form.errors.email !=null">{{
                        __('login.'+form.errors.email) }}</span>
                    </div>
                    <div class="mt-4">
                        <label class="relative flex">
                            <input :class="[isRTL?'pr-9':'pl-9']"
                                class="form-input border-transparent
                                focus:border-transparent
                                peer w-full rounded-lg bg-slate-150 px-3 py-2  ring-primary/50 placeholder:text-slate-400 hover:bg-slate-200 focus:ring dark:bg-navy-900/90 dark:ring-accent/50 dark:placeholder:text-navy-300 dark:hover:bg-navy-900 dark:focus:bg-navy-900"
                                :placeholder="__('login.password')" type="password" required
                                autocomplete="current-password" name="password" v-model="form.password" />
                            <span
                                class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 transition-colors duration-200"
                                    fill="none" viewbox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </span>
                        </label>
                        <span class="text-tiny+ text-error">{{ form.errors.password }}</span>
                    </div>

                    <div class="mt-4 flex items-center justify-between space-x-2" :class="{'space-x-reverse':isRTL}">
                        <label class="inline-flex items-center space-x-2" :class="{'space-x-reverse':isRTL}">
                            <input
                                class="form-checkbox is-outline h-5 w-5 rounded border-slate-400/70 bg-slate-100 before:bg-primary checked:border-primary hover:border-primary focus:border-primary dark:border-navy-500 dark:bg-navy-900 dark:before:bg-accent dark:checked:border-accent dark:hover:border-accent dark:focus:border-accent"
                                type="checkbox" v-model="form.remember" />
                            <span class="line-clamp-1">{{__('login.remember')}}</span>
                        </label>
                        <a v-if="canResetPassword" :href="route('password.request')"
                            class="text-xs text-slate-400 transition-colors line-clamp-1 hover:text-slate-800 focus:text-slate-800 dark:text-navy-300 dark:hover:text-navy-100 dark:focus:text-navy-100">
                            {{__('login.forgot')}}</a>
                    </div>
                    <button type="submit" :class="{ 'opacity-25': form.processing }" :disabled="form.processing"
                        class="btn mt-10 h-10 w-full bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                        {{__('login.signin')}}
                    </button>
                    <div class="mt-4 text-center text-xs+">
                        <p class="line-clamp-1">
                            <span>{{__('login.register')}}</span>

                            <a class="text-primary transition-colors hover:text-primary-focus dark:text-accent-light dark:hover:text-accent"
                                :href="route('register')"> {{__('login.create')}}</a>
                        </p>
                    </div>
                    <div class="my-7 flex items-center space-x-3" :class="{'space-x-reverse':isRTL}">
                        <div class="h-px flex-1 bg-slate-200 dark:bg-navy-500"></div>
                        <p>{{__('login.or')}}</p>
                        <div class="h-px flex-1 bg-slate-200 dark:bg-navy-500"></div>
                    </div>
                    <div class="flex space-x-4" :class="{'space-x-reverse':isRTL}">
                        <Link :href="route('language',{language:'en'})"
                            class="btn w-full space-x-3 border border-slate-300 font-medium text-slate-800 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-450 dark:text-navy-50 dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90">
                        <img class="h-5.5 w-5.5" src="images/logos/google.svg" alt="logo" />
                        <span>Google</span>
                        </Link>

                        <Link type="button" :href="route('language',{language:'ar'})"
                            :class=" {'space-x-reverse':isRTL}"
                            class="btn w-full space-x-3 border border-slate-300 font-medium text-slate-800 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-450 dark:text-navy-50 dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90">
                        <img class="h-5.5 w-5.5" src="images/logos/github.svg" alt="logo" />
                        <span>Github</span>
                        </Link>
                    </div>
                </form>
            </div>
            <button @click="toggleDark()">Switch</button>

            <div class="my-5 flex justify-center text-xs text-slate-400 dark:text-navy-300">
                <a href="#">{{__('login.privacy')}}</a>
                <div class="mx-3 my-1 w-px bg-slate-200 dark:bg-navy-500"></div>
                <a href="#">{{__('login.term')}}</a>
            </div>
        </main>
    </BaseLayout>

</template>
