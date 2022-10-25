<template>
    <div class="modal fade fixed sm:inset-1 md:inset-40 sm:w-full md:w-4/5  sm:h-full outline-none overflow-x-hidden overflow-y-auto"
        id="createTeacherModal" tabindex="-1" aria-labelledby="createTeacherModel" aria-hidden="true">
        <div class="modal-dialog relative w-auto pointer-events-none">
            <div
            class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-gray-300 bg-clip-padding rounded-md outline-none text-current">
            <div
                class="modal-header flex flex-shrink-2 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
                <h5 class="text-xl font-medium leading-normal text-gray-800" id="exampleModalLabel">Add Teacher</h5>
                <button type="button"
                class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
                data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body relative p-4">
                <form  
                    @submit.prevent="createTeacher"
                    enctype="multipart/form-data"  
                    >
                        <div class="bg-gray-100 px-4 py-4 grid grid-cols-1 md:grid-cols-3 lg:grid-cols-3 gap-4 lg:gap-8">
                            <input type="text" placeholder="First Name" v-model="form.first_name" required/>
                            <div v-if="errors.first_name">{{ errors.first_name }}</div>
                            
                            <input type="text" placeholder="Last Name" v-model="form.last_name" required/>
                            <div v-if="errors.last_name">{{ errors.last_name }}</div>
                            
                            <input type="text" placeholder="School Name" v-model="form.school" required />
                            <div v-if="errors.school">{{ errors.school }}</div>
                        </div>
                        <div> Grade Levels</div>
                        <div class="bg-gray-100 px-4 py-4 grid grid-cols-1 md:grid-cols-3 lg:grid-cols-3 gap-4 lg:gap-8">
                            
                            <div 
                                v-for="(grade, index) in gradeLevels"
                                :key="index"
                            >
                                <label>{{ grade }}
                                    <input type="checkbox" :id="grade" v-model="form.grades" :value="grade"/>
                                </label>
                            </div>
                            <div v-if="errors.grades">{{ errors.grades }}</div>
                        </div>
                        <div>Teacher Subjects</div>
                        <div class="bg-gray-100 px-4 py-4 grid grid-cols-1 md:grid-cols-3 lg:grid-cols-3 gap-4 lg:gap-8">
                            
                            <div 
                                v-for="subject in teacherSubjects"
                                :key="subject"
                            >
                                <label>{{ subject }}
                                    <input type="checkbox" :id="subject" v-model="form.subjects" :value="subject"/>
                                </label>
                            </div>
                            <div v-if="errors.subjects">{{ errors.subjects }}</div>
                        </div>

                        <div>Upload Avatar Image</div>
                        <input type="file" multiple @input="form.avatar = $event.target.files[0]" />
                        <button type="submit" 
                            :disabled="processing" 
                            class="px-6
                                my-4
                                py-2.5
                                bg-blue-600
                                text-white
                                font-medium
                                text-xs
                                leading-tight
                                uppercase
                                rounded
                                shadow-md
                                hover:bg-blue-700 hover:shadow-lg
                                focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0
                                active:bg-blue-800 active:shadow-lg
                                transition
                                duration-150
                                ease-in-out
                                ml-1">
                            Save changes
                        </button>
                    </form>
                </div>
                <div
                    class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md">
                    <button 
                        @click="$emit('closeModal')"
                        type="button" 
                        class="px-6
                                mb-6
                                py-2.5
                                bg-green-600
                                text-white
                                font-medium
                                text-xs
                                leading-tight
                                uppercase
                                rounded
                                shadow-md
                                hover:bg-green-700 hover:shadow-lg
                                focus:bg-green-700 focus:shadow-lg focus:outline-none focus:ring-0
                                active:bg-green-800 active:shadow-lg
                                disabled:bg-green-200
                                transition" 
                        data-bs-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
    
</template>
  
<script>
import { Inertia } from '@inertiajs/inertia';

export default {
    props: {
        errors: {
            Object,
        }
    },
    data() {
        return {
            form: {
                first_name: null,
                last_name: null,
                school: null,
                avatar: null,
                grades: [],
                subjects: [],
            },
            gradeLevels: ['K', '1st', '2nd'],
            teacherSubjects: ['Math', 'History', 'ELA', 'Science'],
            processing: false
        }
    },
    methods: {
        createTeacher() {
            
            Inertia.post('/teacher', this.form, {
                onStart: () => { 
                    this.processing = true; 
                },
                onFinish: () => { 
                    this.processing = false; 
                    this.$emit('closeModal');
                }
            });
        }
    },
}
</script>