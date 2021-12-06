<template>
    <v-slide-y-transition v-if="snackbar !== null">
        <v-snackbar
            id="snackbar"
            :value="true"
            :color="snackbar.color"
            :timeout="snackbar.timeout"
            class="pa-2"
            top>
            <span class="text-body-1">
                {{ snackbar.message }}
            </span>
            <template v-slot:action="{ attrs }">
                <v-btn
                    v-bind="attrs"
                    @click="$page.props.flash.snackbar = null" 
                    icon>
                    <v-icon small>
                        mdi-close
                    </v-icon>
                </v-btn>
            </template>
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