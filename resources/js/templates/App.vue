<!-- inertia render from 'routes/web.php' -->
<template>
    <v-app :class="`${isMobile() ? 'mobile' : ''}`">
        <AppBar />
        <Fab />
        <Snackbar />

        <v-main>
            <Home />
                <Divider />
            <Experience />
                <Divider />
            <Projects />
                <Divider />
            <Contact />
        </v-main>

        <Footer />
    </v-app>
</template>

<script>
// layout
import AppBar from './components/AppBar'
import Divider from './components/Divider'
import Fab from './components/Fab'
import Snackbar from './components/Snackbar'
import Footer from './components/Footer'

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
        Divider,
        Fab,
        Snackbar,
        Footer,
        // sections
        Home,
        Experience,
        Projects,
        Contact,
    },
    created() {
        this.setProjects(this.projects)

        // store wakatime data in vuex
        this.$store.commit('item', {
            key: 'wakadata',
            value: this.wakadata
        })

        // check if device prefers dark colors
        const deviceTheme = window.matchMedia('(prefers-color-scheme: dark)');

        // enable dark theme if true
        if(deviceTheme.matches) {
            this.$vuetify.theme.dark = true
        }
    },
}
</script>

<style>
a {
    text-decoration: none;
}

.text-shadow {
    text-shadow: 4px 4px 3px rgba(0,0,0,0.1); 
}

.stripe {
	background: repeating-linear-gradient(
		-55deg,
		#fff,
		#fafafa 10px,
		#f9f9f9 10px,
		#fcfcfc 20px
	);
}

.theme--dark .stripe {
	background: repeating-linear-gradient(
		-55deg,
		#1a1a1a,
		#222 10px,
		#1e1e1e 10px,
		#222 20px
	);
}

.grayscale {
    filter: grayscale(1);
    transition: all 1s linear;
}

.grayscale:hover {
    filter: grayscale(0);
    transition: all 1s linear;
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