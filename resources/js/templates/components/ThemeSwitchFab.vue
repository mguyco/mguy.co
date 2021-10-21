<template>
    <div class="fab">
        <v-tooltip left>
            <template v-slot:activator="{ on }">
                <v-icon 
                    v-on="on"
                    color="yellow"
                    :large="!isMobile()"
                    :small="isMobile()"
                    @click="$vuetify.theme.dark = !$vuetify.theme.dark" >
                    mdi-weather-night
                </v-icon>
            </template>
            Turn the lights {{ $vuetify.theme.dark === true ? 'on' : 'off' }}
        </v-tooltip>
    </div>
</template>

<style scoped>
div.fab {
    position: fixed;
    bottom: 23px;
    right: 23px;
    z-index: 10000;
}
</style>