import Vue from 'vue'
import Vuex from 'vuex'
import { state } from './state'

Vue.use(Vuex)

const debug = process.env.NODE_ENV !== 'production'

const mutations = {
    item(state, item) {
        state[item.key] = item.value
    }
}

const getters = {
    item: state => key => state[key]
}

const actions = {}

const modules = {}

export default new Vuex.Store({
    state,
    mutations,
    getters,
    actions,
    modules,
    debug: debug
})