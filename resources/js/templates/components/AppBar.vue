<template>
    <v-app-bar 
        :class="`app-bar ${$vuetify.theme.dark ? 'dark' : 'white'}`"
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
                :color="(item == activeSection ? 'primary' : 'grey')" 
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
            :nudge-width="200"
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
                <v-list>
                    <v-list-item 
                        v-for="item in menu.items"
                        :key="item.icon"
                        :href="item.url"
                        target="_blank" 
                        class="primary--text gray-to-color">
                        <v-list-item-avatar>
                            <v-avatar>
                                <v-icon color="primary" large>
                                    mdi-{{ item.icon }}
                                </v-icon>
                            </v-avatar>
                        </v-list-item-avatar>
                        <v-list-item-content>
                            <v-list-item-title class="text-body-h6">
                                {{ item.url.replace('https://','') }}
                            </v-list-item-title>
                        </v-list-item-content>
                    </v-list-item>
                </v-list>
            </v-card>
        </v-menu>
        <template 
            v-if="isMobile()"
            v-slot:extension>
            <v-row 
                class="mb-10 mt-3"
                no-gutters>
                <v-col 
                    :align="$vuetify.breakpoint.width < 600 ? 'center' : ''"
                    :offset="$vuetify.breakpoint.width > 600 ? 4 : ''">
                    <v-btn 
                        v-for="item in sections" 
                        class="mr-2 mt-2" 
                        :color="(item == activeSection ? 'primary' : 'grey')" 
                        :key="item" 
                        @click="goToSection(item)"
                        text
                        :small="$vuetify.breakpoint.width > 600"
                        :x-small="$vuetify.breakpoint.width < 600">
                        {{ item }}
                    </v-btn>
                </v-col>
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
                    { icon: 'linkedin', url: 'https://linkedin.com/in/mguyco' }
                ]
            }
        }
    }
}
</script>

<style scoped>
.app-bar.dark {
    background: #121212 !important;
}

.gray-to-color {
    filter: grayscale(1) !important;
    transition: all 1s linear;
}

.gray-to-color:hover {
    filter: grayscale(0) !important;
    transition: all 1s linear;
}

/*
.app-bar .text-shine {
    background: linear-gradient(to left, #2196f3 20%, #7eebab 60%, #54a9ee 70%, #2196f3 80%);
    background-size: 200% auto;
    color: #000;
    background-clip: text;
    -webkit-text-fill-color: transparent;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    -webkit-animation: shine 15s linear infinite;
    animation: shine 15s linear infinite;
}
*/
</style>