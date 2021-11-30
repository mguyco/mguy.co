<template>
    <v-slide-y-transition v-if="snackbar !== null">
        <v-snackbar
            :value="true"
            :color="snackbar.color"
            :timeout="snackbar.timeout"
            class="pa-2">
            <span class="text-body-1">
                {{ snackbar.message }}
            </span>
        </v-snackbar>
    </v-slide-y-transition>
</template>

<script>
export default {
    computed: {
        snackbar() {
            return this.$page.props.flash.snackbar || null
        }
    }
}
</script>