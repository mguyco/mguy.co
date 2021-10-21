import Vue from 'vue'
import VueScroll from 'vue-scrollto'

Vue.use(VueScroll)

export default {
    methods: {
        setActiveSection(section) {
            this.$store.commit('item', { 
                key: 'activeSection', 
                value: section
            })
        },
        setProjects(projects) {
            this.$store.commit('item', { 
                key: 'projects', 
                value: projects
            })
        },
        goToSection(section) {
            this.$scrollTo('#' + section, { offset: -120 })
            this.setActiveSection(section)
        },
        getSize() {
            const bp = this.$vuetify.breakpoint.name

            return (bp == 'xs' | 'sm' ? 'small' : (bp == 'md' | 'lg' ? 'med' : 'large'))
        },
        onIntersect(entries) {
            const section = entries[0]
            
            if(section.isIntersecting === true) {
                this.setActiveSection(section.target.id)
            }
        },
        isMobile() {
            return this.$vuetify.breakpoint.mobile
        },
    }
}