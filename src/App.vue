<template>
  <div id="app">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <img src="./assets/logo.png" width="70px">
        </div>
        <div class="col-md-9">
          <h1>{{ msg }}</h1>
          <hr>
        </div>
      </div>
      <div class="row">
        <div class="col-md-3">
          <h4>Menú</h4>
          <ul>
            <li><a href="">Alumnos</a></li>
            <li><a href="">Maestros</a></li>
            <li><a href="">Grupos</a></li>
            <li><a href="">Registro asistencia</a></li>
          </ul>
        </div>
        <div class="col-md-9">
          <alumnos></alumnos>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import alumnos from './Alumnos.vue'

export default {
  name: 'app',
  components: { alumnos },
  data () {
    return {
      msg: 'Aplicación de control de asistencia 1.0',
      alumnos:[],
      maestros:[],
      grupos:[],
      items: [
        { text:'1ko' },
        { text:'2ko' },
        { text:'3ko' },
      ]
    }
  }
}
</script>

<style>
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}

h1, h2 {
  font-weight: normal;
}

ul {
  list-style-type: none;
  padding: 0;
}

li {
  margin: 0 10px;
}

a {
  color: #42b983;
}
</style>
