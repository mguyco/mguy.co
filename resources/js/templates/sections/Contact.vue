<template>
	<section 
		id="contact"
		v-intersect="onIntersect">
		<v-row>
			<v-col 
				cols="10"
				offset="1" 
				lg="8"
				offset-lg="2"
				align="center">
				<div 
					class="font-shadows-into-light" 
					:style="`font-size:${ $vuetify.breakpoint.width > 800 ? 50 : 32 }px`">
					<div 
						class="text-shine text-shadow" 
						v-html="`Want to know more? ${isMobile() ? '<br />' : ''} Let's talk :)`" />
				</div>
				<v-img 
					class="my-5"
					:width="($vuetify.breakpoint.smAndDown ? 128 : 256)" 
					src="https://i.ibb.co/g9PvSKX/meeting.png" />
			</v-col>
		</v-row>
		<v-row no-gutters>
			<v-col>
				<v-sheet
					:color="sheetColor"
					class="py-15"
					dark>
					<v-form v-model="form.valid">
						<v-row>
							<v-col 
								cols="12"
								lg="8"
								xl="8"
								offset-lg="2"
								offset-xl="2">
								<v-row 
									justify="center" 
									no-gutters>
									<v-col 
										cols="10"
										lg="6"
										xl="6">
										<v-text-field 
											name="name"
											type="text" 
											placeholder="Your name"
											v-model="form.data.name" 
											:rules="[form.rules.required, form.rules.name]"
											:background-color="inputColor" 
											outlined />
									</v-col>
								</v-row>
								<v-row 
									justify="center" 
									no-gutters>
									<v-col 
										cols="10"
										lg="6"
										xl="6">
										<v-text-field 
											name="email"
											type="email" 
											placeholder="Your email address"
											v-model="form.data.email" 
											:background-color="inputColor" 
											:rules="[form.rules.required, form.rules.email]" 
											outlined />
									</v-col>
								</v-row>
								<v-row 
									justify="center" 
									no-gutters>
									<v-col 
										cols="10"
										lg="6"
										xl="6">
										<v-textarea 
											name="message"
											v-model="form.data.message" 
											placeholder="Type message here"
											:background-color="inputColor" 
											:rules="[form.rules.required, form.rules.message]" 
											counter 
											outlined />
									</v-col>
								</v-row>
								<v-row 
									class="mt-10"
									justify="center" 
									align="center">
									<v-col 
										cols="6" 
										align="center">
										<v-btn
											@click="sendMessage" 
											:color="form.valid ? 'success' : 'error'" 
											:readonly="!form.valid" 
											:disabled="!form.valid && form.data.name == ''"
											:loading="form.data.processing" 
											x-large 
											outlined 
											rounded>
											Send Message
										</v-btn>
									</v-col>
								</v-row>
							</v-col>
						</v-row>
					</v-form>
				</v-sheet>
			</v-col>
		</v-row>
	</section>
</template>

<script>
export default {
	remember: {
        data: ['form.data'],
        key: 'contact'
    },
	computed: {
		sheetColor() {
			return this.$vuetify.theme.dark === true ? 'secondary darken-2' : 'primary'
		},
		inputColor() {
			return '';
		}
	},
	data() {
		return {
			form: {
				valid: false,
				url: this.route('contact.form'),
				rules: {
					required: v => !!v || 'Required',
					message: v => (v.length >= 20 && v.length <= 1000) || 'Message must be between 20 and 1000 characters',
					name: v => v.length <= 35 || 'Name is too long',
					email: v => {
						const pattern = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/

						return pattern.test(v) || 'Invalid email address'
					},
				},
				data: this.$inertia.form({
					name: '',
					email: '',
					message: ''
				})
			}
		}
	},
	methods: {
		sendMessage() {
			if(!this.form.valid) return false

			this.form.data.post(this.form.url, { 
				preserveScroll: true
			})
		}
	},
}
</script>

<style>
#contact .text-shine {
    background: linear-gradient(to right, #2196f3 20%, #ee8098 40%, #54a9ee 60%, #2196f3 80%);
    background-size: 200% auto;
    color: #000;
    background-clip: text;
    -webkit-text-fill-color: transparent;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    -webkit-animation: shine 23s linear infinite;
    animation: shine 23s linear infinite;
}
</style>