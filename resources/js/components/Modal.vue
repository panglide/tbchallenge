<template>
    <div class="modal-wrapper">
        
        <div class="modal-content">
            <button
                @click="$emit('close')"
            >
                <i>&#x2715;</i>
            </button>
            <form 
                @submit.prevent="createTeacher"
                enctype="multipart/form-data"
                
            >
                
                <input type="text" placeholder="First Name" v-model="form.first_name" />
                <div v-if="errors.first_name">{{ errors.first_name }}</div>
                
                <input type="text" placeholder="Last Name" v-model="form.last_name" />
                <div v-if="errors.last_name">{{ errors.last_name }}</div>
                
                <input type="text" placeholder="School Name" v-model="form.school">
                <div v-if="errors.school">{{ errors.school }}</div>
                
                <div> Grade Levels</div>
                <div 
                    v-for="(grade, index) in gradeLevels"
                    :key="index"
                >
                    <label>{{ grade }}
                        <input type="checkbox" :id="grade" v-model="form.grades" :value="grade" >
                    </label>
                </div>
                <div v-if="errors.grades">{{ errors.grades }}</div>

                <div>Teacher Subjects</div>
                <div 
                    v-for="subject in teacherSubjects"
                    :key="subject"
                >
                    <label>{{ subject }}
                        <input type="checkbox" :id="subject" v-model="form.subjects" :value="subject" >
                    </label>
                </div>
                <div v-if="errors.subjects">{{ errors.subjects }}</div>
                
                <div>Upload Avatar Image</div>
                <input type="file" multiple @input="form.avatar = $event.target.files[0]" />
                <button 
                    type="submit"
                    :disabled="processing"
                >
                    Save
                </button>
            </form>
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
                onStart: () => { this.processing = true; },
                onFinish: () => { this.processing = false; }
            });

        },  
    },
}
</script>
<style scoped>
.modal-wrapper{
    position: absolute;
    top: 0;
    left: 0;
    height: 100vh;
    width: 100vw;
    background-color: rgba(220, 220, 220, 0.9);
    display: flex;
    justify-content: center;
    align-items: center;

}
.modal-content {
    width: 30%;
    border: 2px solid black;
    border-radius: 25px;
    padding: 20px;
    margin: auto;
}
</style>