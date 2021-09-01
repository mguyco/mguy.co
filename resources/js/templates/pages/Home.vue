<template>
    <section 
        id="home" 
        v-intersect="onIntersect">
        <v-container>
            <v-row :style="(height > 700 ? 'margin-top: ' + (height - 700) + 'px' : '')">
                <v-col 
                    cols="10" 
                    offset="1"
                    lg="6" 
                    offset-lg="3">
                    <v-img 
                        width="225"  
                        style="margin-left:23px" 
                        height="auto" 
                        src="https://i.ibb.co/cYtrv6b/worker.png" />
                </v-col>
            </v-row>
            <v-row>
                <v-col 
                    cols="10"
                    offset="1"  
                    lg="6" 
                    offset-lg="3">
                    <div class="text-h5">
                        Experienced Full-Stack Software Engineer
                    </div>
                    <div class="text-body-1 mt-1 font-weight-light">
                        For the last 5 years, I have been developing web apps fueled by company workflow redesigns with a strength for building smart user experiences and custom API's centered around unified communication integrations. 
                        I am currently looking for oppertunities to expand my developer skills and bring my experience to the next level.
                    </div>
                    <div class="mt-10 text-center">
                        <v-btn 
                            @click="goToPage('experience')"
                            color="primary" 
                            rounded 
                            dark
                            large>
                            About me
                        </v-btn>
                    </div>
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
    mounted() {
        const headerHeight = document.querySelector('header').clientHeight
        const sectionHeight = this.height - headerHeight

        document.querySelector('#home').style.minHeight = sectionHeight + 'px'
    }
}
</script>