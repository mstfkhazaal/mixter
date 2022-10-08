
<template>
    <div class=" h-screen w-full">
        <section class="flex items-center h-full p-16 ">
            <div class="
          container
          flex flex-col
          items-center
          justify-center
          px-5
          mx-auto
          my-8
        ">
                <div class="max-w-md text-center">
                    <h2 class="mb-8 font-extrabold text-9xl dark:text-gray-600">
                        <span class="sr-only">{{ title }}</span>{{ status }}
                    </h2>
                    <p class="text-2xl font-semibold md:text-3xl">{{ description }}</p>
                    <p class="mt-4 mb-8 dark:text-gray-400">
                        But dont worry, you can find plenty of other things on our homepage.
                    </p>
                    <a rel="noopener noreferrer" href="/"
                        class="px-8 py-3 font-semibold rounded bg-[#dca73d] text-white">Back to homepage</a>
                </div>
            </div>
        </section>
    </div>
</template>
<script>
export default {
    props: {
        status: Number,
    },
    computed: {
        title() {
            return {
                503: "503: Service Unavailable",
                500: "500: Server Error",
                404: "404: Page Not Found",
                403: "403: Forbidden",
            }[this.status];
        },
        description() {
            return {
                503: "Sorry, we are doing some maintenance. Please check back soon.",
                500: "Whoops, something went wrong on our servers.",
                404: "Sorry, the page you are looking for could not be found.",
                403: "Sorry, you are forbidden from accessing this page.",
            }[this.status];
        },
    },
};
</script>
