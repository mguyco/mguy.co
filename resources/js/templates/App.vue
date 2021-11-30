<!-- inertia render from 'routes/web.php' -->
<template>
    <v-app>
        <AppBar />
        <ThemeSwitchFab />
        <Snackbar />
        
        <v-main>
            <Home />
                <SectionDivider />
            <Experience />
                <SectionDivider />
            <Projects />
                <SectionDivider />
            <Contact />
        </v-main>
    </v-app>
</template>

<script>
// layout
import AppBar from './components/AppBar'
import SectionDivider from './components/SectionDivider'
import ThemeSwitchFab from './components/ThemeSwitchFab'
import Snackbar from './components/Snackbar'

// sections
import Home from './sections/Home'
import Experience from './sections/Experience'
import Projects from './sections/Projects'
import Contact from './sections/Contact'

export default {
    // props passed from 'routes/web.php'
    props: {
        projects: Array,
        wakadata: Array,
    },
    components: {
        // layout
        AppBar,
        SectionDivider,
        ThemeSwitchFab,
        Snackbar,
        // sections
        Home,
        Experience,
        Projects,
        Contact,
    },
    created() {
        this.setProjects(this.projects)

        this.$store.commit('item', {
            key: 'wakadata',
            value: this.wakadata
        })

        // check if device is using dark colors
        const deviceTheme = window.matchMedia('(prefers-color-scheme: dark)');

        // match device colors with vuetify theme
        if(deviceTheme.matches) {
            this.$vuetify.theme.dark = true
        }
    },
    mounted() {

    },
    methods: {

    }
}
</script>

<style>
a {
    text-decoration: none;
}

.text-shadow {
    text-shadow: 4px 4px 3px rgba(0,0,0,0.1); 
}

@-webkit-keyframes shine {
  to {
    background-position: 200% center;
  }
}
@keyframes shine {
  to {
    background-position: 200% center;
  }
}
</style>