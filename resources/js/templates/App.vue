<!-- inertia render from 'routes/web.php' -->
<template>
    <v-app>
        <TopAppBar />
        <ThemeSwitchFab />
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
import TopAppBar from './components/TopAppBar'
import SectionDivider from './components/SectionDivider'
import ThemeSwitchFab from './components/ThemeSwitchFab'

// sections
import Home from './sections/Home'
import Experience from './sections/Experience'
import Projects from './sections/Projects'
import Contact from './sections/Contact'

export default {
    // props passed from 'routes/web.php'
    props: {
        projects: Array
    },
    components: {
        // layout
        TopAppBar,
        SectionDivider,
        ThemeSwitchFab,
        // sections
        Home,
        Experience,
        Projects,
        Contact,
    },
    created() {
        this.setProjects(this.projects)

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

.font-great-vibes {
    font-family: 'Great Vibes', cursive;
}

.font-pacifico {
    font-family: 'Pacifico', cursive;
}

.font-cookie {
    font-family: 'Cookie', cursive;
}

.font-shadows-into-light {
    font-family: 'Shadows Into Light', cursive;
}

.text-shadow {
    text-shadow: 4px 4px 3px rgba(0,0,0,0.1); 
}
</style>