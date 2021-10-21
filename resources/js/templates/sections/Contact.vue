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
					class="font-shadows-into-light text-shadow primary--text" 
					:style="`font-size:${ $vuetify.breakpoint.width > 800 ? 50 : 32 }px`">
					Want to know more? Let's talk
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
					<v-form 
						ref="form" 
						v-model="form.valid"
						:disabled="form.data.processing" 
						lazy-validation>
						<v-row>
							<v-col 
								cols="12"
								lg="8"
								offset-lg="2">
								<v-row 
									justify="center" 
									no-gutters>
									<v-col 
										cols="4" 
										offset="1">
										<span class="text-h6 font-weight-light">
											Name
										</span>
									</v-col>
									<v-col cols="5">
										<v-text-field 
											v-model="form.data.name" 
											type="text" 
											placeholder="Your name"
											:rules="form.rules.name"
											:background-color="inputColor" 
											required 
											outlined />
									</v-col>
								</v-row>
								<v-row 
									justify="center" 
									no-gutters>
									<v-col 
										cols="4"
										offset="1">
										<span class="text-h6 font-weight-light">
											Email
										</span>
									</v-col>
									<v-col cols="5">
										<v-text-field 
											v-model="form.data.email" 
											type="email" 
											placeholder="Your email address"
											:background-color="inputColor" 
											:rules="form.rules.email" 
											required 
											outlined />
									</v-col>
								</v-row>
								<v-row 
									justify="center" 
									no-gutters>
									<v-col 
										cols="4"
										offset="1">
										<span class="text-h6 font-weight-light">
											Message
										</span>
									</v-col>
									<v-col cols="5">
										<v-textarea 
											v-model="form.data.message" 
											placeholder="Type message here"
											:background-color="inputColor" 
											:rules="form.rules.message" 
											required 
											counter 
											outlined />
									</v-col>
								</v-row>
								<v-row 
									class="mt-10"
									no-gutters>
									<v-col 
										cols="12"
										align="center">
										<v-btn
											@click="sendMessage" 
											color="white" 
											:disabled="!form.valid"
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
	computed: {
		sheetColor() {
			return this.$vuetify.theme.dark === true ? '#161616' : 'primary'
		},
		inputColor() {
			return '';
		}
	},
	data() {
		return {
			form: {
				valid: true,
				data: this.$inertia.form({
					name: '',
					email: '',
					message: ''
				}),
				rules: {
					name: [
						v => !!v || 'Name is required',
						v => v.length >= 5 || 'Name is too short',
						v => v.length <= 35 || 'Name is too long',
					],
					email: [
						v => /.+@.+/.test(v) || 'E-mail must be valid'
					],
					message: [
						v => !!v || 'Message is required', 
						v => v.length >= 30 || 'Message must be at least 30 characters',
						v => v.length <= 1000 || 'Message must be less than 1000 characters'
					]
				}
			}
		}
	},
	methods: {
		sendMessage() {
			this.form.data.post('/api/contact')
		}
	}
}
</script>