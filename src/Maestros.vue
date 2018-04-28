<template>
	<div class="row">
		<div class="col-md-12">
			<div class="new-item">
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
					<tr v-for="(maestro, index) in maestros">
						<td>{{ maestro.nombre }}</td>
						<td>{{ maestro.apellidos }}</td>
						<td>
							<button class="btn btn-info" v-on:click="editar">Editar</button>
							<button class="btn btn-warning" v-on:click="remover(index)">Remover</button>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</template>

<script>
export default {
	name: 'maestros',
	data () {
		return {
			nuevo: {},
			maestros:[
				{ nombre:'Maestros 1', apellidos:'Ricardo' },
				{ nombre:'Maestros 2', apellidos:'Bolsón' }
			]
		}
	},

	mounted(){
		this.$parent.msg = 'Listado de maestros';
	},

	methods: {

		agregar: function () {
			this.maestros.push(this.nuevo);
			this.nuevo = {};
		},

		editar: function () {
			console.log('Editar');
		},

		remover: function (maestro) {
			this.maestros.splice(maestro, 1);
		}
	}
}
</script>

<style>
	.new-item { margin: 1em 0 2em; }
</style>