<template>
  <div>
  	<div id="main">
  		<button
			@click="createTeacher"
		>
			Add Teacher</button>
	  	<table>
	  		<thead>
	  			<tr>
					<th>Avatar</th>
	  				<th>ID</th>
	  				<th>Teacher</th>
	  				<th>School</th>
					<th>Subject(s)</th>
	  				<th>Grade(s)</th>
	  			</tr>
	  		</thead>
	  		<tbody>
			  	<tr 
					v-for="teacher in teachers"
					:key="teacher.id"
				>
					<td><div class="avatar" :style="{backgroundImage: 'url(' + teacher.avatar_url + ')'}"></div></td>
			  		<td>{{ teacher.id }}</td>
			  		<td>{{ teacher.first_name }} {{ teacher.last_name }}</td>
			  		<td>{{ teacher.school }}</td>
					<td>{{ teacher.subjects.join(', ') }}</td>		  		
			  		<td>{{ teacher.grades.join(', ') }}</td>
			  	</tr>
			</tbody>
	  	</table>
	</div>
	<modal 
		v-if="showModal"
		@close="showModal = false"
		:errors="errors"
	>
	</modal>
  </div>
</template>

<script>
import Modal from '../components/Modal.vue';
export default {
	props: {
		teachers: {
	      required: true,
	      type: Array
	    },
		errors: {
			Object,
		}
	},
	components: {
		Modal
	},
	data() {
		return {
			showModal: false,
		}
	},
	methods: {
		createTeacher() {
			this.showModal = true;
		},
	},
	mounted() {
	}
};
</script>
<style scoped>
.avatar {
	width: 75px;
	height: 75px;
	background-repeat: no-repeat;
	background-size: cover;
}
</style>