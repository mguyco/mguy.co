<template>
    <section 
        id="home" 
        v-intersect="onIntersect">
        <v-container>
            <v-row align="start">
                <v-col 
                    :sm="(sectionHeight < 600 ? 4 : 12)" 
                    md="10"
                    offset-md="1" 
                    lg="6" 
                    offset-lg="3"
                    xl="6"
                    offset-xl="3">
                    <v-img 
                        :width="`${(isMobile() ? (sectionHeight < 600 ? 150 : 200) : iconWidth)}px`"   
                        style="margin-left:23px" 
                        height="auto" 
                        src="https://i.ibb.co/cYtrv6b/worker.png" />
                </v-col>
                <v-col 
                    :sm="(sectionHeight < 600 ? 8 : 12)" 
                    md="10"
                    offset-md="1" 
                    lg="6" 
                    offset-lg="3"
                    xl="6"
                    offset-xl="3">
                    <div :class="`text-${($vuetify.breakpoint.smAndDown ? 'body-1 font-weight-bold' : 'h5')} px-2`">
                        Experienced Full-Stack Software Engineer
                    </div>
                    <div :class="`text-body-1 mt-1 font-weight-light px-2`">
                        For the last 5 years, I have been developing web apps fueled by company workflow redesigns with a strength for building smart user experiences and custom API's centered around unified communication integrations. 
                        I am currently looking for opportunities to expand my skillset and bring my exerpeince to the next level.
                    </div>
                </v-col>
            </v-row>
            <v-row class="mt-10">
                <v-col align="center">
                    <v-btn 
                        @click="goToSection('experience')"
                        color="primary" 
                        outlined 
                        rounded 
                        dark
                        large>
                        Learn more about me
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