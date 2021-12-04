<template>
    <div id="fab">
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
            Turn the lights {{ isDark() ? 'on' : 'off' }}
        </v-tooltip>
    </div>
</template>

<style>
#fab {
    position: fixed;
    bottom: 23px;
    right: 23px;
    z-index: 10000;
}
</style>