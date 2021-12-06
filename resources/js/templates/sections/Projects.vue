<template>
	<section 
		id="projects"
		v-intersect="onIntersect">
		<v-row class="mt-10 mx-10">
			<v-col cols="12">
				<v-row no-gutters>
					<v-col align="center">
						<div 
							class="font-shadows-into-light" 
							:style="`font-size:${ $vuetify.breakpoint.width > 800 ? 72 : 44 }px`">
							<div class="text-shine text-shadow">
								Projects
							</div>
						</div>
					</v-col>
				</v-row>
				<v-row class="mt-10">
					<v-col cols="12">
						<!-- mobile view -->
						<div v-if="isMobile()">
							<!-- mobile: grid -->
							<v-row 
								justify="center" 
								align="center">
								<v-col 
									align="center" 
									v-for="project in projects"
									:key="`project-${project.id}-mobile`"
									:id="`project-id-${project.id}`"
									grow>
									<img 
										class="project-photo-img"
										:src="project.photo"
										width="180px"
										height="auto" 
										:style="`border-radius:23px;filter: drop-shadow(0rem 0rem 1rem rgba(${colorToRGB(project.color)}, 0.${$vuetify.theme.dark === true ? '3' : '8'}3))`"
										@click="openProject(project)"
										contain />
								</v-col>
							</v-row>

							<!-- mobile: bottom sheet dialog -->
							<v-bottom-sheet 
								v-model="dialog.open"
								:overlay-color="(dialog.project == null ? '' : dialog.project.color)"
								:overlay-opacity="0.25">
								<v-sheet 
									v-if="dialog.project != null"
									class="pa-8 project-item stripe">
									<div :class="`${dialog.project.color}--text text-h4 font-weight-thin project-title`">
										{{ dialog.project.title }}
									</div>
									<div class="mt-2">
										<v-chip 
											v-for="tag in dialog.project.tags.filter(item => !item.data.isVendor)"
											class="mx-1 text-caption project-tag" 
											:key="`project-${dialog.project.id}-tag-${tag.tag_id}`" 
											:color="`${dialog.project.color} darken-${$vuetify.theme.dark === true ? 3 : 1}`"
											:href="tag.data.url"
											target="_blank" 
											dark
											x-small>
											{{ tag.data.name }}
										</v-chip>
									</div>
									<div 
										class="mt-2 text-body-1 project-description"
										v-html="dialog.project.description.replaceAll('<a href', '<a target=\'_blank\' class=\'' + dialog.project.color + '--text text--darken-1\' href')" />
									<div class="mt-10 mb-5 text-center">
										<v-btn  
											:color="dialog.project.color"
											@click="dialog.open = false"
											rounded 
											outlined 
											large>
											Close
										</v-btn>
									</div>
								</v-sheet>
							</v-bottom-sheet>
						</div>

						<!-- desktop: timeline -->
						<v-timeline 
							class="px-10"
							v-else 
							align-top>
							<v-timeline-item 
								v-for="(project, index) in projects"
								:key="`project-${project.id}-desktop`"
								:class="`pb-15 mb-15 project-item`" 
								:color="project.color"
								small
								fill-dot>
								<template v-slot:icon>
									<v-avatar 
										size="16" 
										class="color-picker"
										:color="project.color" 
										@click="project.color = randomColor()" />
								</template>
								<template v-slot:opposite>
									<div :class="`float-${(index % 2 === 0 ? 'right' : 'left')}`">
										<img 
											class="project-photo-frame" 
											src="https://i.ibb.co/VvYhZvC/project-frame-phone.png"
											:style="`filter: drop-shadow(0rem 0rem 2rem rgba(${colorToRGB(project.color)}, 0.${$vuetify.theme.dark === true ? '3' : '8'}3))`" />
										
										<img 
											class="project-photo-img"
											:src="project.photo" />
									</div>
								</template>
								<v-card class="px-5 py-2 stripe">
									<v-card-text>
										<div class="project-title text-center text-h3 font-weight-light">
											<span :class="`${project.color}--text`">
												{{ project.title }}
											</span>
										</div>
										<div class="mt-3 text-center">
											<v-chip 
												v-for="tag in project.tags.filter(item => !item.data.isVendor)"
												class="mx-1 text-body-2 project-tag" 
												:key="`project-${project.id}-tag-${tag.tag_id}`" 
												:color="`${project.color} darken-${$vuetify.theme.dark === true ? 3 : 1}`"
												:href="tag.data.url"
												target="_blank" 
												dark
												label
												small>
												{{ tag.data.name }}
											</v-chip>
										</div>
										<div class="mt-5 project-description">
											<span v-html="project.description.replaceAll('<a href', '<a target=\'_blank\' class=\'' + project.color + '--text text--lighten-1\' href')" />
										</div>
									</v-card-text>
								</v-card>
							</v-timeline-item>
						</v-timeline>
					</v-col>
				</v-row>
			</v-col>
		</v-row>
	</section>
</template>

<script>
export default {
	data() {
		return {
			projects: [],
			dialog: {
				open: false,
				project: null
			}
		}
	},
	mounted() {
		this.projects = this.$store.getters.item('projects').map(project => {
			return {
				...project,
				color: 'indigo'
				//color: this.randomColor()
			}
		})
	},
	methods: {
		openProject(project) {
			this.dialog.open = true
			this.dialog.project = project
			//this.dialog.project.color = this.randomColor()

			this.$scrollTo('#project-id-' + project.id, { offset: -60 })
		},
	},
}
</script>

<style>
#projects .project-item .color-picker {
	cursor: pointer;
}

#projects .project-item .project-description {
	font-family: 'Roboto', sans-serif;
	font-size: 1.44rem;
	line-height: 1.5;
	font-weight: 300;
}

.theme--dark #projects .project-item .project-tag {
	filter: grayscale(1);
	transition: all 0.3s linear;
}

.theme--dark #projects .project-item .project-tag:hover {
	filter: grayscale(0);
	transition: all 0.3s linear;
}

#projects .project-item .project-photo-img {
	position: absolute;
	margin-left: -239px;
	margin-top: 47px;
	height: 350px;
	width: 222px;
	border-radius: 7px;
}

#projects .project-item .project-photo-frame {
	position: relative;
	height: 446px;
	width: 258px;
}

#projects .text-shine {
    background: linear-gradient(to right, #2196f3 20%, #7406f1 40%, #54a9ee 60%, #2196f3 80%);
    background-size: 200% auto;
    color: #000;
    background-clip: text;
    -webkit-text-fill-color: transparent;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    -webkit-animation: shine 5s linear infinite;
    animation: shine 5s linear infinite;
}
</style>