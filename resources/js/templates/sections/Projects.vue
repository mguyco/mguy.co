<template>
	<section 
		id="projects"
		v-intersect="onIntersect">
		<v-row class="mt-10">
			<v-col 
				cols="12" 
				:style="`padding:0 ${ $vuetify.breakpoint.width > 1000 ? 10 : 5 }%`">
				<v-row no-gutters>
					<v-col align="center">
						<div 
							class="font-shadows-into-light text-shadow mt-3 primary--text" 
							:style="`font-size:${ $vuetify.breakpoint.width > 800 ? 72 : 44 }px`">
							Projects
						</div>
					</v-col>
				</v-row>
				<v-row>
					<v-col cols="12">
						<!-- mobile view -->
						<v-timeline 
							v-if="isMobile()" 
							dense 
							small 
							align-top>
							<v-timeline-item 
								v-for="project in projects"
								class="pb-10 pr-3" 
								:key="`project-${project.id}`"
								:color="project.color">
								<div :class="`text-h6 font-weight-thin ${project.color}--text`">
									{{ project.title }}
								</div>
								<div class="py-1 text-caption grey--text">
									<span 
										v-for="(vendor,index) in project.tags.filter(item => item.data.isVendor)"
										:key="vendor.data.name">
										<span v-if="index > 0">-</span>
										{{ vendor.data.name}}
									</span>
								</div>
								<div class="project-text mobile">
									{{ project.description }}
								</div>
								<div>
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
							</v-timeline-item>
						</v-timeline>

						<!-- desktop view -->
						<v-timeline v-else>
							<v-timeline-item 
								v-for="(project, index) in projects"
								class="pb-15 mb-15" 
								:key="`project-${project.id}`"
								:color="project.color">
								<template v-slot:opposite>
									<div :class="`text-h3 font-weight-thin ${project.color}--text`">
										{{ project.title }}
									</div>
									<div class="text-body-1">
										<span 
											v-for="(vendor,index) in project.tags.filter(item => item.data.isVendor)"
											:key="vendor.data.name">
											<v-icon 
												v-if="index > 0 || project.tags.filter(item => item.data.isVendor).length == 1" 
												class="pb-1"
												:color="project.color">
												mdi-menu-right
											</v-icon>
											<a 
												:href="vendor.data.url"
												class="grey--text" 
												target="_blank">
												{{ vendor.data.name}}
											</a>
										</span>
									</div>
									<div class="mt-2">
										<v-img 
											:class="`float-${(index % 2 === 0 ? 'right' : 'left')} elevation-10`" 
											width="400px" 
											src="https://i.ibb.co/MfPCKd7/ucxbuilder.png" />
									</div>
								</template>
								<v-card class="pa-5">
									<v-card-text>
										<div class="project-text">
											{{ project.description }}
										</div>
										<div class="mt-5">
											<v-chip 
												v-for="tag in project.tags.filter(item => !item.data.isVendor)"
												class="mx-1" 
												:key="`project-${project.id}-tag-${tag.tag_id}`" 
												:color="project.color"
												dark
												label
												small>
												<span class="text-body-2">
													{{ tag.data.name }}
												</span>
											</v-chip>
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
import colors from 'vuetify/lib/util/colors';

export default {
	data() {
		return {
			projects: [],
			colorList: [],
			colorsInUse: [],
			colorsAvailable: [],
		}
	},
	mounted() {
		this.colorList = Object.assign({}, colors)
		this.colorsAvailable = Object.keys(this.colorList)

		this.projects = this.$store.getters.item('projects').map(project => {
			return {
				...project,
				color: this.colorPicker()
			}
		})
	},
	methods: {
		colorPicker() {
			const index = Math.floor(Math.random() * (this.colorsAvailable.length - 1))
			const color = this.colorsAvailable[index].toString().replace(/[A-Z]/g, letter => `-${letter.toLowerCase()}`)
			const skip = ['black','brown','white','grey','blue-grey','yellow']

			if(skip.includes(color)) return this.colorPicker()

			this.colorsAvailable.splice(index, 1);

			return color
		},
	},
}
</script>

<style>
.project-text {
	font-family: 'Roboto', sans-serif;
	font-size: 20px;
	line-height: 1.6;
	font-weight: 300;
}

.project-text.mobile {
	font-size: 15px;
}
</style>