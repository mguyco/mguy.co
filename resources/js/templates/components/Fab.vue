<template>
    <div id="fab">
        <v-tooltip left>
            <template v-slot:activator="{ on }">
                <v-icon 
                    v-on="on"
                    color="yellow"
                    :large="!isMobile()"
                    :small="isMobile()"
                    @click="toggleDark()" >
                    mdi-weather-night
                </v-icon>
            </template>
            Turn the lights {{ $vuetify.theme.dark === true ? 'on' : 'off' }}
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