<template>
	<div class="row">
		<div class="col-md-12">
			<div class="new-item">
				<div class="form-inline">
					<div class="form-group">
					   <label for="exampleInputName2">Nombre:</label>
					   <input type="text" class="form-control" v-model="nuevo.nombre" id="exampleInputName2" placeholder="Grupo 1">
					</div>
					<div class="form-group">
					  <label for="exampleInputEmail2">Descripción:</label>
					  <input type="email" class="form-control" v-model="nuevo.descripcion" id="exampleInputEmail2" placeholder="Principiantes">
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
						<th>Descripción</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
					<tr v-for="(grupo, index) in grupos">
						<td>{{ grupo.nombre }}</td>
						<td>{{ grupo.descripcion }}</td>
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
	name: 'grupos',
	data: function () {
		return {
			nuevo: {},
			grupos:[
				{ nombre:'Grupos 1', descripcion:'Descripción 1' },
				{ nombre:'Grupos 2', descripcion:'Descripción 2' }
			]
		}
	},

	mounted: function () {
		this.$parent.msg = 'Listado de grupos';
	},

	methods: {

		agregar: function () {
			this.grupos.push(this.nuevo);
			this.nuevo = {};
		},

		editar: function () {
			console.log('Editar');
		},

		remover: function (grupo) {
			this.grupos.splice(grupo, 1);
		}
	}
}
</script>

<style>
	.new-item { margin: 1em 0 2em; }
</style>