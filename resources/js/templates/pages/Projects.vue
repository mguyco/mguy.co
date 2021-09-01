<template>
	<section 
		id="projects"
		v-intersect="onIntersect">
		<v-row>
			<v-col 
				cols="12" 
				lg="8"
				offset-lg="2">
				<v-row no-gutters>
					<v-col align="center">
						<v-img 
							width="128" 
							src="https://i.ibb.co/4J8DrQP/idea.png" />
						<div class="text-h6 mt-3 primary--text font-weight-light">
							Full-Stack Portfolio
						</div>
					</v-col>
				</v-row>
				<v-timeline class="mt-5">
					<v-timeline-item 
						v-for="project in projects"
						class="pb-10" 
						:key="`project-${project.id}`"
						:color="project.color">
						<template v-slot:opposite>
							<!-- title -->
							<div :class="`text-h3 font-weight-thin ${project.color}--text`">
								{{ project.title }}
							</div>
							<div class="text-h5 font-weight-thin grey--text">
								<!-- vendors -->
								<span 
									v-for="(vendor,index) in project.tags.filter(item => item.data.isVendor)"
									:key="vendor.data.name">
									<span v-if="index > 0">-</span>
									{{ vendor.data.name}}
								</span>
							</div>
							<div>
								<!-- tags -->
								<v-chip 
									v-for="tag in project.tags.filter(item => !item.data.isVendor)"
									class="mx-1" 
									:key="`project-${project.id}-tag-${tag.tag_id}`" 
									:color="project.color"
									dark
									label
									x-small>
									{{ tag.data.name }}
								</v-chip>
							</div>
						</template>
						<!-- description -->
						<div class="text-body-1 font-weight-light">
							{{ project.description }}
						</div>
					</v-timeline-item>
				</v-timeline>
			</v-col>
		</v-row>
	</section>
</template>

<script>
export default {
	data() {
		return {
			projects: [],
			colorsInUse: [],
			colors: [
				'cyan',
				'purple',
				'green',
				'indigo',
				'light-blue',
				'pink',
				'deep-purple',
				'teal',
				'amber',
				'orange',
			]
		}
	},
	mounted() {
		this.projects = this.$store.getters.item('projects').map(project => {
			return {
				...project,
				color: this.getColor()
			}
		})
	},
	methods: {
		getColor() {
			const index = Math.floor(Math.random() * this.colors.length)
			const color = this.colors[index].toString()

			this.colors.splice(index, 1);

			return color
		}
	}
}
</script>