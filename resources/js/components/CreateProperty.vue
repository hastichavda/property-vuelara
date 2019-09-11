<template >
    <div class="container">
        <div class="card form">
            <div class="card-header">
                Create Property
            </div>
            <div class="card-body">
                <form action="" metod="post" @submit.prevent="createProperty">
                    <div class="form-group">
                        <label for="">Title</label>
                        <input v-model="property.title" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea v-model="property.description" rows="3" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Image</label>
                        <input  @change="onFileChange" ref="file" type="file" class="form-control">
                    </div> 
                    <div class="form-group">
                        <label for="">Price</label>
                        <input v-model="property.price" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        {{ selectedTypes }}
                        <label for="">Property Type</label>
                        <select v-model="selectedTypes" multiple>
                            <option v-for="(type,index) in typeList"
                                    :value="type.id"
                                    :key="index">
                                    {{ type.name }}
                            </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Type</label><br>  
                        <div class="form-control">
                            <input v-model="property.action" class="ml-3" type="radio" value="Rent" name="rentalType">Rent
                            <input v-model="property.action" class="ml-3" type="radio" value="sale" name="rentalType">Sale
                        </div>
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
import axios from 'axios';
export default {
    props:{
        propertydata: {
            type:Array,
            required:true
        },
    },
    data()
    {
        return {
            selectedTypes: [],
            typeList: [],
            list: [],
            property: {
                title: '',
                description: '',
                image:'',
                price:'',
                action:''
            }   
        }
    },
    mounted()
    {
        console.log('mounted');
        this.fetchType();
        if(this.propertyData)
        {
            this.list = this.propertyData
        }
    },
    methods: {
        async fetchType () {
            let res = await axios.get('/propertytype')
            if (res.data) {
                this.typeList = res.data.types
            }
        },
        onFileChange(e)
        {
            this.property.image = this.$refs.file.files[0];
        },
        createImage(file) {
            let reader = new FileReader();
            reader.onload = (e) => {
                this.property.image = e.target.result;
            };
            reader.readAsDataURL(file);
        },
        async createProperty() {
            let data = {
                title: this.property.title,
                description: this.property.description,
                image: this.property.image,
                price: this.property.price,
                types: this.selectedTypes,
                action:this.property.action
            }
            console.log(data);
            let property = new FormData();
            property.append('title', data.title);
            property.append('description', data.description);
            property.append('image', data.image);
            property.append('price', data.price);
            property.append('types',  JSON.stringify(data.types));
            property.append('action',data.action);
        
            axios.post('/property',property, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
            })
            .then((res) => {
                this.property.title = '';
                this.property.description = '';
                this.property.image = '';
                this.property.price = '';
                this.property.typeList = '';
                this.property.action = '';
                this.list.push(res.data.property);
            })
            .catch((err) => console.error(err));
        },

    }
}
</script>
<style>
    .form
    {
        width:70%;
    }
</style>