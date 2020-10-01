
<template>
    <div class="container">
        <form @submit.prevent="saveData">
            <span class="text-danger" v-if="form.errors.has('name')" v-text="form.errors.get('name')"></span>
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label for="inputSubject">Subject name</label>
                    <input v-model="form.name" :class="{'is-invalid' : form.errors.has('name')}"  type="text" class="form-control" @keydown="
                    form.errors.clear('name')" id="inputSubject">
                </div>

                <div class="form-group col-md-4">
                <label for="semester">Semester</label>
                <select v-model="form.semester"  :class="{'is-invalid' : form.errors.has('semester')}" id="semester" class="form-control">
                    <option value="ljetni">Ljetni</option>
                    <option value="zimski">Zimski</option>
                </select>
                </div>
                
                <div class="form-group col-md-2">
                    <label for="ects">ECTS</label>
                    <input v-model="form.ects" :class="{'is-invalid' : form.errors.has('ects')}"  type="number" class="form-control" id="ects">
                </div>
            </div>
            <span class="text-danger" v-if="form.errors.has('description')" v-text="form.errors.get('description')"></span>
            <div class="form-group">
                <label for="description">Description</label>
                <input v-model="form.description" :class="{'is-invalid' : form.errors.has('description')}"  type="text" class="form-control" id="description">
            </div>
            <button v-if="this.isEdit == false" class="btn btn-outline-success" type="submit" id="button-addon2">Add subject</button>
            <button v-else type="button" v-on:click="updateSubject()" class="btn btn-outline-primary" id="button-addon2">Update subject</button>
        </form>
        <hr>
        <div>
            <table class="table">
                <tr v-for="subject in subjects" v-bind:key="subject.id" v-bind:name="subject.name">
                    <td class="text-left">{{ subject.name }}</td>
                    <td class="text-right">
                        <button v-on:click="editSubject(subject.id, subject.name, subject.description, subject.ects, subject.semester)" class="btn btn-info">Edit</button>
                        <button v-on:click="deleteSubject(subject.id)" class="btn btn-danger">Delete</button>
                    </td>
                </tr>
            </table>
        </div> 
    </div>
</template>

<script>
    export default {

        data() {
            return {
                subjects: '',
                isEdit: false,
                form: new Form({
                    name: '',
                    description: '',
                    ects: '',
                    semester: '',
                })
            }
        },
        methods: {

            getSubjects() {
                axios.get('/api/admin/subjects')
                .then((res) => {
                    this.subjects = res.data
                })
                .catch((error) => {
                    console.log(error)
                })
            }, 

            saveData() {
                let data = new FormData();
                data.append('name', this.form.name)
                data.append('description', this.form.description)
                data.append('ects', this.form.ects)
                data.append('semester', this.form.semester)
                axios.post('/api/admin/subjects', data)
                .then((res) => {
                    this.form.reset()
                    this.getSubjects()
                    console.log(res);
                }).catch((error) => {
                    //console.log(error)
                    this.form.errors.record(error.response.data.errors)
                })
            },
            
            editSubject(id, name, description, ects, semester) {
                this.id = id,
                this.form.name = name,
                this.form.description = description,
                this.form.ects = ects,
                this.form.semester = semester,
                this.isEdit = true
            },
            updateSubject() {
                axios.put(`/api/admin/subjects/${this.id}`,
                { name: this.form.name})
                .then(res => {
                    this.form.name = '',
                    this.form.description = '',
                    this.form.ects = '',
                    this.form.semester = '',
                    this.isEdit = false,
                    this.getSubjects()
                    //console.log(res)
                }).catch(err => {
                    console.log(err)
                })
            },
            deleteSubject(id) {
                axios.delete(`/api/admin/subjects/${id}`)
                .then(res => {
                    this.form.name = '',
                    this.getSubjects();
                    console.log(res)
                }).catch(err => {
                    console.log(err)
                })
            }

        },
        mounted() {
            this.getSubjects()
        }
    }
</script>
