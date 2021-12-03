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
							class="font-shadows-into-light" 
							:style="`font-size:${ $vuetify.breakpoint.width > 800 ? 72 : 44 }px`">
							<div class="text-shine text-shadow">
								Projects
							</div>
						</div>
					</v-col>
				</v-row>
				<v-row>
					<v-col cols="12">
						<!-- mobile view -->
						<div v-if="isMobile()">
							<v-row
								v-for="project in projects"
								:key="`project-${project.id}`"
								justify="center" 
								class="mt-10">
								<v-sheet 
									height="698"
									color="transparent">
									<v-img src="https://i.ibb.co/VvYhZvC/project-frame-phone.png" />
									<!--
									<a 
										:href="project.url"
										target="_blank">
										<v-img 
											:class="`float-${(index % 2 === 0 ? 'right' : 'left')} project-photo`"  
											:src="project.photo" 
											:style="`filter: drop-shadow(0rem 0rem 2rem rgba(${colorToRGB(project.color)}, 0.${$vuetify.theme.dark === true ? '2' : '5'}3))`" 
										/>
									</a>
									-->
								</v-sheet>
							</v-row>
						</div>

						<!-- desktop view -->
						<v-timeline 
							v-else 
							align-top>
							<v-timeline-item 
								v-for="(project, index) in projects"
								:key="`project-${project.id}`"
								:class="`pb-15 mb-15 project-item ${$vuetify.theme.dark === true ? 'dark' : ''}`" 
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
									<!--
									<div :class="`text-h3 font-weight-thin ${project.color}--text project-title`">
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
												class="project-vendor" 
												target="_blank">
												{{ vendor.data.name }}
											</a>
										</span>
									</div>
									-->
									<div :class="`float-${(index % 2 === 0 ? 'right' : 'left')}`">
										<img 
											class="project-photo-frame" 
											src="https://i.ibb.co/VvYhZvC/project-frame-phone.png"
											:style="`filter: drop-shadow(0rem 0rem 2rem rgba(${colorToRGB(project.color)}, 0.${$vuetify.theme.dark === true ? '3' : '8'}3))`" />
										
										<img class="project-photo-img"
											src="https://i.ibb.co/jvthGR0/project-picture-desktop-torque-vue.png" />
									</div>
								</template>
								<v-card class="px-5 py-2">
									<v-card-text>
										<div class="project-description">
											<span v-html="project.description.replaceAll('<a href', '<a target=\'_blank\' class=\'' + project.color + '--text text--darken-1\' href')" />
										</div>
										<div class="mt-5">
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
			colorsInUse: [],
			colorsAvailable: [],
		}
	},
	computed: {
		colorList() {
			return Object.keys(Object.assign({}, colors))
		}
	},
	mounted() {
		this.colorsAvailable = this.colorList

		this.projects = this.$store.getters.item('projects').map(project => {
			return {
				...project,
				color: this.randomColor()
			}
		})
	},
	methods: {
		colorName(name) {
			return name.replace(/[A-Z]/g, letter => `-${letter.toLowerCase()}`)
		},
		randomColor() {
			const index = Math.floor(Math.random() * (this.colorsAvailable.length - 1))
			const color = this.colorName(this.colorsAvailable[index].toString())
			const skip = [
				'black',
				'brown',
				'white',
				'grey',
				'blue-grey',
				'yellow',
				'lime'
			]

			if(skip.includes(color)) return this.randomColor()

			return color
		},
		hexToRGB(hex) {
            return hex.replace(/^#?([a-f\d])([a-f\d])([a-f\d])$/i
                    ,(m, r, g, b) => '#' + r + r + g + g + b + b)
            .substring(1).match(/.{2}/g)
            .map(x => parseInt(x, 16)).join(',')
        },
        colorToHex(color) {
			const values = color.split('-')

			if(values.length == 2) {
				color = values[0] + values[1].charAt(0).toUpperCase() + values[1].substr(1, values[1].length)
			}

			return colors[color].base
        },
		colorToRGB(color) {
			return this.hexToRGB(this.colorToHex(color))
		},
	},
}
</script>

<style>
#projects .project-item {
	transition: all 0.7s linear;
}

#projects .project-item .project-vendor,
#projects .project-item .project-description a {
	color: rgba(55,55,55,0.5);
	transition: all 1s
}
 
#projects .project-item .project-vendor:hover,
#projects .project-item .project-description a:hover {
	color: rgba(55,55,55,0.75);
	transition: all 1s
}

#projects .project-item.dark .project-vendor,
#projects .project-item.dark .project-description a {
	color: rgba(255,255,255,0.5);
	transition: all 1s
}
 
#projects .project-item.dark .project-vendor:hover,
#projects .project-item.dark .project-description a:hover {
	color: rgba(255,255,255,1);
	transition: all 1s
}

#projects .project-item .color-picker {
	cursor: pointer;
}

#projects .project-item .project-description {
	font-family: 'Roboto', sans-serif;
	font-size: 20px;
	line-height: 1.6;
	font-weight: 300;
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

#projects .project-item.mobile .project-description {
	font-size: 1rem;
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