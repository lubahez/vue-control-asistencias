import Vue from 'vue'
import VueRouter from 'vue-router'
import App from './App.vue'

/* Módulos de la aplicación */

import Alumnos from './Alumnos.vue'

Vue.use(VueRouter);

const routes = [
	{ path: '/alumnos', component: Alumnos }
]

const router = new VueRouter({
	routes: routes
});


new Vue({
  el: '#app',
  render: h => h(App),
  router: router
})
