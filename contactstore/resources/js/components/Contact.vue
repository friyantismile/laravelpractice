<template>
    
    <div>
        <h1>Add Contact</h1>
        <form action="#" @submit.prevent="edit ? updateContact(contact.id) : createContact()">
            <div class="form-group">
                <label>Name</label>
                <input v-model="contact.name" type="text" name="name" value="" class="form-control" />
            </div>
            <div class="form-group">
                <label>Email</label>
                <input v-model="contact.email" type="text" name="email" value="" class="form-control" />
            </div>
            <div class="form-group">
                <label>Phone</label>
                <input v-model="contact.phone" type="text" name="phone" value="" class="form-control" />
            </div>

            <div class="form-group">
                <button v-show="edit" type="submit" name="phone" value="" class="form-control">Save Changes</button>
                <button v-show="!edit" type="submit" name="phone" value="" class="form-control">New contact</button>
            </div>
            
        </form>
        <hr>
        <h1>Contacts</h1>
        <ul class="list-group">
            <li class="list-group-item" v-for="contact in list">
                <strong>{{contact.name}}</strong> {{contact.email}} {{contact.phone}}
                <button @click="showContact(contact.id)" class="btn btn-default btn-xs">Edit</button>
                <button @click="deleteContact(contact.id)" class="btn btn-danger btn-xs">Delete</button>
            </li>
        </ul>
    </div>
</template>

<script>
export default{
    data() {
        return {
            edit: false,
            list: [],
            contact: {
                id:'',
                phone:'',
                name:'',
                email:''
            }
        }
    },
    mounted() {
        console.log('contact component loaded!');
        this.fetchContactList();
    },
    methods: {
        //async is recommended
        async fetchContactList(){
            let datas = await axios.get('api/contacts');
            this.list = datas.data;
        },
        createContact(){
            let self = this;
            let params = Object.assign({}, self.contact);
            axios.post('api/contact/store', params)
                .then(function() {
                    self.contact.name = '';
                    self.contact.phone = '';
                    self.contact.email = '';
                    self.edit = false;
                    self.fetchContactList();
                })
                .catch(function(error){
                    console.log(error);
                });
        },
        async showContact(id){
            let self = this;
            let response = await axios.get('api/contact/'+id);
            self.contact.id=response.data.id;
            self.contact.name=response.data.name;
            self.contact.email=response.data.email;
            self.contact.phone=response.data.phone;
            self.edit = true;
        },
        async deleteContact(id){
            let self = this;
            await axios.delete('api/contact/'+id);
            self.fetchContactList();
        },
        async updateContact(id){
            let self = this;
            let params = Object.assign({}, self.contact);
            await axios.patch('api/contact/'+id, params);
            self.contact.name = '';
            self.contact.phone = '';
            self.contact.email = '';
            self.edit = false;
            self.fetchContactList();
        },
       
    }
}
</script>