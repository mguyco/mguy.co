<template>
    <v-app-bar 
        id="appbar" 
        class="app-bar"
        :height="`${(isMobile() ? 70 : 120)}px`" 
        elevate-on-scroll 
        app>
        <div 
            :style="`font-size: ${(isMobile() ? 44 : 70)}px`"
            class="pa-3 primary--text">
            <span class="font-great-vibes text-shadow text-shine">
                {{ title }}
            </span>
        </div>
        <v-spacer />
        <div v-if="!isMobile()">
            <v-btn 
                v-for="item in sections" 
                :key="item" 
                :class="item == activeSection ? 'primary--text active' : ''" 
                @click="goToSection(item)" 
                class="mr-2" 
                text
                large>
                <span class="text-body-1">
                    {{ item }}
                </span>
            </v-btn>
        </div>
        <v-menu
            v-model="menu.open"
            :close-on-content-click="false"
            offset-y 
            offset-x>
            <template v-slot:activator="{ on, attrs }">
                <v-avatar 
                    :size="(isMobile() ? 42 : 84)" 
                    v-bind="attrs"
                    v-on="on"
                    class="mx-5">
                    <v-img src="https://i.ibb.co/938xyRb/picture.png" />
                </v-avatar>
            </template>

            <v-card> 
                <v-list :dense="isMobile()">
                    <v-list-item 
                        v-for="item in menu.items"
                        :key="item.icon"
                        :href="item.url"
                        target="_blank" 
                        class="primary--text grayscale">
                        <v-list-item-avatar>
                            <v-avatar>
                                <v-icon color="primary">
                                    mdi-{{ item.icon }}
                                </v-icon>
                            </v-avatar>
                        </v-list-item-avatar>
                        <v-list-item-content>
                            <v-list-item-title class="text-body-h6">
                                {{ item.url.replace('https://','').replace('mailto:','') }}
                            </v-list-item-title>
                        </v-list-item-content>
                    </v-list-item>
                </v-list>
            </v-card>
        </v-menu>
        <template 
            v-if="isMobile()"
            v-slot:extension>
            <v-row class="mt-10 mb-14" justify="center">
                <v-btn 
                    v-for="item in sections" 
                    :class="`mr-2 mt-2 ${item == activeSection ? 'primary--text active' : ''}`" 
                    :key="item" 
                    @click="goToSection(item)"
                    text
                    :small="$vuetify.breakpoint.width > 400"
                    :x-small="$vuetify.breakpoint.width < 400">
                    {{ item }}
                </v-btn>
            </v-row>
        </template>
    </v-app-bar>
</template>

<script>
export default {
    computed: {
        title() {
            return this.$store.getters.item('title')
        },
        size() {
            return this.getSize()
        },
        toolbar() {
            return {
                height: (this.size == 'small' ? 96 : (this.size == 'med' ? 80 : 120)),
                font: (this.size == 'small' ? 44 : (this.size == 'med' ? 50 : 70)),
            }
        },
        activeSection() {
            return this.$store.getters.item('activeSection')
        },
        sections() {
            return this.$store.getters.item('sections')
        }
    },
    data() {
        return {
            menu: {
                open: null,
                items: [
                    { icon: 'github', url: 'https://github.com/mguyco' },
                    { icon: 'linkedin', url: 'https://linkedin.com/in/mguyco' },
                    { icon: 'gmail', url: 'mailto:mguy.co@gmail.com' },
                ]
            }
        }
    }
}
</script>

<style>
.theme--dark #appbar {
    background: #121212 !important;
}
</style>