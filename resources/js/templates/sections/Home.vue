<template>
    <section 
        id="home" 
        v-intersect="onIntersect">
        <v-container>
            <v-row 
                align="start" 
                justify="center">
                <v-col 
                    cols="10"
                    lg="5">
                    <v-img 
                        :width="`${(isMobile() ? (sectionHeight < 600 ? 150 : 200) : iconWidth)}px`"   
                        class="worker-icon" 
                        height="auto" 
                        src="https://i.ibb.co/cYtrv6b/worker.png" />
                </v-col>
            </v-row>
            <v-row 
                align="start" 
                justify="center">
                <v-col 
                    cols="10"
                    lg="5"
                    class="px-5">
                    <div :class="`text-${(isMobile() ? 'h6' : 'h4')}`">
                        {{ titleText }}
                    </div>
                    <div :class="`text-${(isMobile() ? 'body-1' : 'h6')} font-weight-light mt-1`">
                        <p>
                            {{ subText }}
                        </p>
                    </div>
                </v-col>
            </v-row>
            <v-row>
                <v-col align="center">
                    <v-btn 
                        @click="goToSection('experience')"
                        color="primary" 
                        outlined 
                        rounded 
                        dark
                        large>
                        {{ buttonText }}
                    </v-btn>
                </v-col>
            </v-row>
        </v-container>
    </section>
</template>

<script>
export default {
    computed: {
        height() {
            return window.innerHeight;
        }
    },
    data() {
        return {
            titleText: process.env.MIX_HOMEPAGE_TITLE,
            subText: process.env.MIX_HOMEPAGE_TEXT,
            buttonText: process.env.MIX_HOMEPAGE_BUTTON,
            sectionHeight: 0,
            iconWidth: 175
        }
    },
    methods: {
        setSize() {
            const headerHeight = document.querySelector('header').clientHeight

            this.sectionHeight = this.height - headerHeight

            document.querySelectorAll('section').forEach(section => section.style.minHeight = this.sectionHeight + 'px')

            if(this.sectionHeight > 600) this.iconWidth = 325

            if(this.sectionHeight > 800) this.iconWidth = 475
        }
    },
    mounted() {
        this.setSize()
    },
}
</script>