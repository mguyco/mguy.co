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
                        href="https://www.mguy.dev"
                        target="_blank" 
                        small 
                        dark>
                        www.mguy.dev
                    </v-chip>
                </div>
                <div class="mt-10 links">
                    <a 
                        v-for="item in links"
                        :key="item.icon"
                        :href="item.url"
                        target="_blank">
                        <v-icon>
                            mdi-{{ item.icon }}
                        </v-icon>
                    </a>
                </div>
            </v-card-text>
        </v-card>
    </v-footer>
</template>

<script>
export default {
    computed: {
        color() {
            return this.$vuetify.theme.dark === true ? 'secondary' : 'primary'
        },
        links() {
            return this.$store.getters.item('links')
        }
    }
}
</script>

<style>
#footer .links a {
    margin: 0 1%;
}

#footer .links .v-icon {
    opacity: 0.23;
    transition: all 1s linear;
    font-size: 3.5rem;
}

.mobile #footer .links a {
    margin: 0 4%;
}

.mobile #footer .links .v-icon {
    font-size: 2rem;
}

.theme--light #footer .links .v-icon {
    opacity: 0.55;
    color: #fff;
}

#footer .links .v-icon:hover {
    opacity: 1;
    transition: all 1s linear;
}


</style>