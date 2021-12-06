import Vue from 'vue'
import VueScroll from 'vue-scrollto'
import colors from 'vuetify/lib/util/colors'

Vue.use(VueScroll)

export default {
    methods: {
        route: window.route,
        
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
        isDark() {
            return this.$vuetify.theme.dark
        },
        toggleDark() {
            this.$vuetify.theme.dark = !this.$vuetify.theme.dark
        },
        colorName(name) {
			return name.replace(/[A-Z]/g, letter => `-${letter.toLowerCase()}`)
		},
		randomColor() {
            const colorsAvailable = Object.keys(Object.assign({}, colors))

			const index = Math.floor(Math.random() * (colorsAvailable.length - 1))
			const color = this.colorName(colorsAvailable[index].toString())
			const skip = [
				'black',
				'brown',
				'white',
				'grey',
				'blue-grey',
				'yellow',
				'lime'
			]

			if(skip.includes(color)) return this.randomColor()

			return color
		},
		hexToRGB(hex) {
            return hex.replace(/^#?([a-f\d])([a-f\d])([a-f\d])$/i
                    ,(m, r, g, b) => '#' + r + r + g + g + b + b)
            .substring(1).match(/.{2}/g)
            .map(x => parseInt(x, 16)).join(',')
        },
        colorToHex(color) {
			const values = color.split('-')

			if(values.length == 2) {
				color = values[0] + values[1].charAt(0).toUpperCase() + values[1].substr(1, values[1].length)
			}

			return colors[color].base
        },
		colorToRGB(color) {
			return this.hexToRGB(this.colorToHex(color))
		},
    }
}