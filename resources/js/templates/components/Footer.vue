<template>
    <v-footer 
        id="footer" 
        :color="`${color} darken-2`">
        <v-card 
            class="text-center"
            color="transparent" 
            width="100%"
            flat
            tile>
            <v-card-text>
                <div :class="`text-body-${isMobile() ? 2 : 1} font-weight-light white--text`">
                    Copyright {{ new Date().getFullYear() }} — <strong>Michael Guy</strong>
                </div>
                <div class="mt-1">
                    <v-chip 
                        :color="color"
                        href="https://www.mguy.co"
                        target="_blank" 
                        small 
                        dark>
                        www.mguy.co
                    </v-chip>
                </div>
            </v-card-text>
        </v-card>
    </v-footer>
</template>

<script>
export default {
    computed: {
        color() {
            return this.isDark() ? 'secondary' : 'primary'
        }
    }
}
</script>