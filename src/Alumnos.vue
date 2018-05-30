<template>
	<div class="row">
		<div class="col-md-12">
			<div class="new-user">
				<div class="form-inline">
					<div class="form-group">
					   <label for="exampleInputName2">Nombre:</label>
					   <input type="text" class="form-control" v-model="nuevo.nombre" id="exampleInputName2" placeholder="Juan">
					</div>
					<div class="form-group">
					  <label for="exampleInputEmail2">Apellidos:</label>
					  <input type="email" class="form-control" v-model="nuevo.apellidos" id="exampleInputEmail2" placeholder="Perez">
					</div>
					<button class="btn btn-success" v-on:click="agregar">Agregar</button>
				</div>
			</div>
		</div>
		<div class="col-md-12">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Nombre</th>
						<th>Apellidos</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
					<tr v-for="(alumno, index) in alumnos">
						<td>{{ alumno.nombre }}</td>
						<td>{{ alumno.apellidos }}</td>
						<td>
							<button class="btn btn-info" v-on:click="editar">Editar</button>
							<button class="btn btn-warning" v-on:click="remover(index)">Remover</button>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="modal" tabindex="-1" role="dialog">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title">Modal title</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <p>Modal body text goes here.</p>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-primary">Save changes</button>
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		      </div>
		    </div>
		  </div>
		</div>
	</div>
</template>

<script>
import axios from 'axios';

export default {
	name: 'alumnos',
	data: function () {
		return {
			nuevo: {},
			alumnos:[
				{ nombre:'Fulanito', apellidos:'Ricardo' },
				{ nombre:'Chuchita', apellidos:'Bolsón' }
			]
		}
	},

	mounted: function (){
		this.$parent.msg = 'Listado de alumnos';
		this.listar();
	},

	methods: {

		listar: function () {
			axios.get('App.php?uri=alumnos')
			.then((response) => {
				console.log(response.data);
				this.alumnos = response.data;
			});
		},

		agregar: function () {
			this.alumnos.push(this.nuevo);
			this.nuevo = {};
		},

		editar: function () {
			console.log('Editar');
		},

		remover: function (alumno) {
			this.alumnos.splice(alumno, 1);
		}
	}
}
</script>

<style>
	.new-user { margin: 1em 0 2em; }
</style>