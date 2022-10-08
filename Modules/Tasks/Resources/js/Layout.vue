<template>
    <app>
       <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Tasks
            </h2>
        </template>

        <slot></slot>
    </app>
</template>

<script>
import App from '@/Layouts/Authenticated.vue'

export default {
    name: 'Layout',
    components: {
        App,
    },
}
</script>
