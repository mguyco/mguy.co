<template>
	<section 
		id="experience"
		v-intersect="onIntersect">
		<v-row>
			<v-col 
				cols="8"
				offset="2">
				<div class="text-h6 primary--text font-weight-light">
					Experience
				</div>
				<div class="mt-3 grayscale">
					<v-row align="center">
						<v-img 
							v-for="img in images" 
							width="44" 
							class="mx-2" 
							:key="img.name" 
							:src="img.url" />
					</v-row>
				</div>
			</v-col>
		</v-row>
	</section>
</template>

<script>
export default {
	computed: {
		activePage() {
			return this.$store.getters.item('activePage')
		}
	},
	data() {
		return {
			images: [
				{
					name: 'Vue',
					url: 'https://cdn.worldvectorlogo.com/logos/vue-js-1.svg',
				},
				{
					name: 'Vuetify',
					url: 'https://cdn.worldvectorlogo.com/logos/vuetify.svg',
				},
				{
					name: 'CSS',
					url: 'https://cdn.worldvectorlogo.com/logos/css-3.svg'
				},
				{
					name: 'Laravel',
					url: 'https://cdn.worldvectorlogo.com/logos/laravel-2.svg',
				},
				{
					name: 'PHP',
					url: 'https://cdn.worldvectorlogo.com/logos/php-1.svg'
				},
				{
					name: 'MySQL',
					url: 'https://cdn.worldvectorlogo.com/logos/mysql-6.svg'
				},
				{
					name: 'MongoDB',
					url: 'https://cdn.worldvectorlogo.com/logos/mongodb-icon-1.svg'	
				},
				{
					name: 'Git',
					url: 'https://cdn.worldvectorlogo.com/logos/git-icon.svg'
				},
				{
					name: 'Bit Bucket',
					url: 'https://cdn.worldvectorlogo.com/logos/bitbucket-icon.svg'
				},
				{
					name: 'Ubuntu',
					url: 'https://cdn.worldvectorlogo.com/logos/ubuntu-4.svg'
				}
			]
		}
	},
	watch: {
		activePage() {
			document.querySelectorAll('#experience .v-image').forEach(img => {
				if(this.activePage == 'experience')  {
					img.classList.add('active')
				}

				else {
					img.classList.remove('active')
				}
			})
		}
	}
}
</script>

<style scoped>
.grayscale .v-image {
	transform: scale(0.75);
	transition: all 5s;
}

.grayscale .v-image.active {
	transform: scale(1);
	transition: all 5s;
}

.grayscale .v-image {
	filter: grayscale(1);
	transition: all 5s;
}

.grayscale .v-image.active {
	filter: grayscale(0);
	transition: all 5s;
}
</style>