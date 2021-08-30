import { createStore } from 'vuex'
//import Vue from 'vue'
/* import Vuex from 'vuex'

Vue.use(Vuex)
 */
export default createStore( {
    state: {
        productos: []
    },
    mutations: {
        setProductos(state, payload) {
            state.productos = payload
            console.log(state.productos)
        }
    },
    actions: {
        async fetchData ({commit}) {
            try {
              const res = await fetch('https://mdn.github.io/learning-area/javascript/oojs/json/superheroes.json')
              const data = await res.json()
              commit('setProducto',data)
            } catch (error) {
              console.log(error)
            }
      
        },

    },
    modules: {
        
    }
})



