<template>
    <v-dialog 
        :value="open" 
        width="800" 
        transition="dialog-bottom-transition" 
        overlay-color="primary"
        overlay-opacity="0.85" 
        @input="$emit('close')">
        <v-card>
            <v-card-text class="pa-7">
                <v-row align="center">
                    <v-col cols="6">
                        <v-row 
                            align="center"
                            no-gutters>
                            <v-col cols="4">
                                <v-avatar size="84">
                                    <v-img src="https://i.ibb.co/938xyRb/picture.png" />
                                </v-avatar>
                            </v-col>
                            <v-col cols="8">
                                <div class="text-h4">
                                    Michael Guy
                                </div>
                                <div class="text-body-1">
                                    Full Stack Software Engineer
                                </div>
                            </v-col>
                        </v-row>
                    </v-col>
                    <v-col cols="6" align="center">
                        <v-avatar 
                            color="primary"
                            class="mx-2">
                            <v-icon large dark>
                                mdi-github
                            </v-icon>
                        </v-avatar>

                        <v-avatar 
                            color="primary"
                            class="mx-2">
                            <v-icon large dark>
                                mdi-linkedin
                            </v-icon>
                        </v-avatar>

                        <v-avatar 
                            color="primary"
                            class="mx-2">
                            <v-icon large dark>
                                mdi-gmail
                            </v-icon>
                        </v-avatar>

                        <v-avatar 
                            color="primary"
                            class="mx-2">
                            <v-icon large dark>
                                mdi-twitter
                            </v-icon>
                        </v-avatar>
                    </v-col>
                </v-row>
            </v-card-text>
        </v-card>
    </v-dialog>
</template>

<script>
export default {
    props: {
        open: Boolean
    }
}
</script>