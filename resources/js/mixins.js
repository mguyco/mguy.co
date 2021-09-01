import Vue from 'vue'
import VueScroll from 'vue-scrollto'

Vue.use(VueScroll)

export default {
    methods: {
        setActivePage(page) {
            this.$store.commit('item', { 
                key: 'activePage', 
                value: page 
            })
        },
        setProjects(projects) {
            this.$store.commit('item', { 
                key: 'projects', 
                value: projects
            })
        },
        goToPage(page) {
            this.$scrollTo('#' + page, { offset: -120 })
            this.setActivePage(page)
        },
        getSize() {
            const bp = this.$vuetify.breakpoint.name

            return (bp == 'xs' | 'sm' ? 'small' : (bp == 'md' | 'lg' ? 'med' : 'large'))
        },
        onIntersect(entries) {
            if(entries[0].isIntersecting === true) {
                this.setActivePage(entries[0].target.id)
            }
        }
    }
}