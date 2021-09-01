<!-- inertia render from 'routes/web.php' -->
<template>
    <v-app>
        <AppBar />
        <ContactFab />
        <v-main>
            <Home />
                <Divider />
            <Experience />
                <Divider />
            <Projects />
                <Divider />
            <Contact />
        </v-main>
    </v-app>
</template>

<script>
// layout
import AppBar from './components/AppBar'
import ContactFab from './components/ContactFab'
import Divider from './components/Divider'

// pages
import Home from './pages/Home'
import Experience from './pages/Experience'
import Projects from './pages/Projects'
import Contact from './pages/Contact'

export default {
    // props passed from 'routes/web.php'
    props: {
        projects: Array
    },
    components: {
        AppBar,
        ContactFab,
        Divider,
        Home,
        Experience,
        Projects,
        Contact,
    },
    created() {
        this.setProjects(this.projects) // this.$store.commit('item', { key: 'projects', value: this.projects })
    }
}
</script>
