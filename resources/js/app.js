require('./bootstrap');

import { createInertiaApp } from '@inertiajs/inertia-vue'
import Vue from 'vue';
import Vuetify from 'vuetify'
import store from './store'
import mixins from './mixins'

Vue.use(Vuetify)
Vue.mixin(mixins)

createInertiaApp({
    resolve: template => require(`./templates/${template}`),
    setup({ el, App, props }) {
        new Vue({ 
            vuetify: new Vuetify({
                theme: {
                    customProperties: true
                }
            }),
            store,
            render: h => h(App, props)
        }).$mount(el)
    }
})