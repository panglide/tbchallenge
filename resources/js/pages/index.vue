<template>
  	<div id="main">
		<div class="text-center text-gray-800 p-6">
			<h1 class="text-5xl font-bold mt-0">Teachers</h1>
		</div>
		<div class="flex space-x-2 justify-end my-6">
  			<button 
				type="button" 
				class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
				@click="showModal = true"
				data-bs-toggle="exampleModal"
			>
				Add Teacher
			</button>
		</div>

		<!-- Modal -->
		<modal
			v-if="showModal"
			:errors="errors"
			@close="showModal = false"
		>
		</modal>
		<!-- end Modal -->

		<div class="flex flex-col">
			<div class="overflow-x-auto">
				<div class="overflow-auto">
					<table class="min-w-full">
						<thead class="border-b bg-gray-100">
							<tr>
								<th scope="col-2" class="text-sm font-medium text-gray-900 px-4 py-4 text-center">Avatar:</th>
								<th scope="col-2" class="text-sm font-medium text-gray-900 px-4 py-4 text-center">Name:</th>
								<th scope="col-1" class="text-sm font-medium text-gray-900 px-4 py-4 text-center">ID:</th>
								<th scope="col-1" class="text-sm font-medium text-gray-900 px-4 py-4 text-center">School:</th>
								<th scope="col-3" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">Grades:</th>
								<th scope="col-3" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">Subjects:</th>
							</tr>
						</thead>
						<tbody
						v-for="teacher in teachers"
						:key="teacher.id"
						>
							<tr class="border-b bg-gray-50">
								<td class="p-4"><div class="avatar" :style="{backgroundImage: 'url(' + teacher.avatar_url + ')'}"></div></td>
								<td class="text-sm text-gray-900 text-center font-light px-4 py-4">{{ teacher.first_name }} {{ teacher.last_name }}</td>
								<td class="text-sm text-gray-900 text-center font-light px-4 py-4">{{ teacher.id }}</td>
								<td class="text-sm text-gray-900 text-center font-light px-4 py-4">{{ teacher.school }}</td>
								<td class="text-sm text-gray-900 text-center font-light px-6 py-8">{{ teacher.grades.join(', ') }}</td>
								<td class="text-sm text-gray-900 text-center font-light px-6 py-4">{{ teacher.subjects.join(', ') }}</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>	
		</div>
		<div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="exampleModalCenteredScrollable" tabindex="-1" aria-labelledby="exampleModalCenteredScrollable" aria-modal="true" role="dialog">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable relative w-auto pointer-events-none">
    <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
      <div class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
        <h5 class="text-xl font-medium leading-normal text-gray-800" id="exampleModalCenteredScrollableLabel">
          Modal title
        </h5>
        <button type="button"
          class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
          data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body relative p-4">
        <p>This is some placeholder content to show a vertically centered modal. We've added some extra copy here to show how vertically centering the modal works when combined with scrollable modals. We also use some repeated line breaks to quickly extend the height of the content, thereby triggering the scrolling. When content becomes longer than the predefined max-height of modal, content will be cropped and scrollable within the modal.</p>
    <br><br><br><br><br><br><br><br><br><br>
    <p>Just like that.</p>
      </div>
      <div
        class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md">
        <button type="button"
          class="inline-block px-6 py-2.5 bg-purple-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-purple-700 hover:shadow-lg focus:bg-purple-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-purple-800 active:shadow-lg transition duration-150 ease-in-out"
          data-bs-dismiss="modal">
          Close
        </button>
        <button type="button"
          class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out ml-1">
          Save changes
        </button>
      </div>
    </div>
  </div>
</div>
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