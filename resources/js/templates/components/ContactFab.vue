<template>
    <div>
        <ContactCard 
            :open="open"
            @close="open = false" />

        <v-btn
            @click.stop="open = true" 
            color="light-blue lighten-2"
            elevation="2" 
            bottom 
            right 
            fixed 
            dark 
            fab>
            <v-icon>
                mdi-card-account-details
            </v-icon>
        </v-btn>
    </div>
</template>

<script>
import ContactCard from './ContactCard'

export default {
    components: {
        ContactCard
    },
    data() {
        return {
            open: false
        }
    }
}
</script>
