<template>
    <v-app-bar
        color="white" 
        :height="toolbar.height" 
        elevate-on-scroll 
        app>
        <div 
            :style="`font-size: ${toolbar.font}px`"
            :class="(size == 'large' ? 'pa-5' : 'pa-1') + ' primary--text toolbar-title'">
            {{ title }}
        </div>
        <v-spacer />
        <div v-if="size != 'small'">
            <v-btn 
                v-for="page in pages" 
                :key="page" 
                :color="(page == activePage ? 'primary' : 'grey')" 
                @click="goToPage(page)" 
                class="mr-2" 
                text
                large>
                {{ page }}
            </v-btn>
        </div>
        <v-avatar class="mx-5">
            <v-img src="https://i.ibb.co/938xyRb/picture.png" />
        </v-avatar>
        <template 
            v-if="size == 'small'"
            v-slot:extension>
            <v-row 
                class="mb-10"
                no-gutters>
                <v-col align="center">
                    <v-btn 
                        v-for="page in pages" 
                        class="mr-2 mt-2" 
                        :color="(page == activePage ? 'primary' : 'grey')" 
                        :key="page" 
                        @click="goToPage(page)"
                        text
                        small>
                        {{ page }}
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
        activePage() {
            return this.$store.getters.item('activePage')
        },
        pages() {
            return this.$store.getters.item('pages')
        }
    }
}
</script>

<style scoped>
.toolbar-title {
    font-family: 'Great Vibes', Helvetica, sans-serif;
    text-shadow: 4px 4px 3px rgba(0,0,0,0.1); 
}
</style>