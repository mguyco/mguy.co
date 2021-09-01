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
				<div class="text-h4 primary--text font-weight-thin">
					Want to know more? Let's talk
				</div>
				<v-img 
					class="mt-5"
					width="128" 
					src="https://i.ibb.co/g9PvSKX/meeting.png" />
			</v-col>
		</v-row>
		<v-row no-gutters>
			<v-col>
				<v-sheet
					color="primary"
					class="py-15"
					dark>
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
									<v-text-field type="text" outlined />
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
									<v-text-field type="email" outlined />
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
									<v-textarea outlined />
								</v-col>
							</v-row>
							<v-row 
								class="mt-2"
								no-gutters>
								<v-col 
									cols="12"
									align="center">
									<v-btn
										color="white" 
										large 
										outlined 
										rounded>
										Send Message
									</v-btn>
								</v-col>
							</v-row>
						</v-col>
					</v-row>
				</v-sheet>
			</v-col>
		</v-row>
	</section>
</template>