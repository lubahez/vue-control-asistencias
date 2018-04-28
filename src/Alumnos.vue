<template>
	<div class="row">
		<div class="col-md-12">
			<form class="form-inline">
				<div class="form-group">
				   <label for="exampleInputName2">Nombre:</label>
				   <input type="text" class="form-control" v-model="nuevo.nombre" id="exampleInputName2" placeholder="Jane Doe">
				</div>
				<div class="form-group">
				  <label for="exampleInputEmail2">Apellidos:</label>
				  <input type="email" class="form-control" v-model="nuevo.apellidos" id="exampleInputEmail2" placeholder="jane.doe@example.com">
				</div>
				<button class="btn btn-success" v-on:click="agregar">Agregar</button>
			</form>
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
	</div>
</template>

<script>
export default {
	name: 'alumnos',
	data () {
		return {
			nuevo: {},
			alumnos:[
				{ nombre:'Fulanito', apellidos:'Ricardo' },
				{ nombre:'Chuchita', apellidos:'Bolsón' }
			]
		}
	},

	methods: {

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