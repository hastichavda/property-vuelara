<template>
    <div class="card">
        <div class="card-header">
            Edit Property
        </div>
        <div class="card-body">
            <form @submit.prevent="updateProperty">
                <div class="form-group">
                    <label for="">title</label>
                    <input v-model="formData.title" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    <input v-model="formData.description" ref="file" type="text" class="form-control">
                </div>
               
                <div class="form-group">
                    <label for="">Image</label>
                    <img :src="formData.image" width="50" height="50" alt="img"/>
                    <input  @change="onFileChange" type="file" ref="file" class="form-control">  
                </div>
                <div class="form-group">
                    <label for="">Price</label>
                    <input v-model="formData.price" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <li v-for="(type, index) in formData.types" 
                    :key="index"
                    class="list-group items">
                        {{ type.name}}
                    </li>
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
                            <input v-model="formData.action" class="ml-3" type="radio" value="Rent" name="rentalType">Rent
                            <input v-model="formData.action" class="ml-3" type="radio" value="sale" name="rentalType">Sale
                        </div>
                    </div>
                <button type="submit" class="btn btn-info">Update</button>  
            </form>
        </div>
    </div>
</template>
<script>
export default {
    props:{
        editData: {
            type: Object,
            required: true
        }
    },
    data()
    {
        return {
            selectedTypes: [],
            typeList: [],
            list:[],
            formData: {
                title:'',
                description: '',
                image:'',
                price:'',
                action:''
            }
        }
    },
    mounted()
    {
        if(this.editData)
        {
            this.formData.title = this.editData.title;
            this.formData.description = this.editData.description;
            this.formData.price = this.editData.price;
            this.formData.types = this.editData.types;
            this.formData.image = this.editData.image;
            this.formData.action  = this.editData.action;
        }
        this.fetchType();
    }, 
    methods: {
        async fetchData(id)
        {
            let res = await axios.get('/property/' + this.$route.params.id + '/edit')

            if(res.data)
            {
                this.formData.title = res.data.properties.title
                this.formData.description = res.data.properties.description
                this.formData.price = res.data.properties.price
                this.formData.types = res.data.properties.types
                this.formData.image = res.data.properties.image
                this.formData.action = res.data.properties.action
            }   
        },
        onFileChange(e)
        {

            this.formData.image = this.$refs.file.files[0];
        },
        createImage(file) {
            let reader = new FileReader();
            reader.onload = (e) => {
                this.formData.image = e.target.result;
            };
            reader.readAsDataURL(file);
        },
        async updateProperty(e)
        {
            let data = {
                title : this.formData.title,
                description : this.formData.description,
                price : this.formData.price,
                types : this.selectedTypes,
                image : this.formData.image,
                action: this.formData.action
            }
            console.log(data);
            let property = new FormData();
            property.append('title', data.title);
            property.append('description', data.description);
            property.append('image', data.image);
            property.append('price', data.price);
            property.append('types',  JSON.stringify(data.types));
            property.append('action',data.action);
            let res = await axios.put('/property/' + this.editData.id , property, { headers: { 'Content-Type': 'multipart/form-data' }})
                                // .then((res) => {
                                //     this.property.title = '';
                                //     this.property.description = '';
                                //     this.property.image = '';
                                //     this.property.price = '';
                                //     this.property.typeList = '';
                                //     this.list.push(res.data.property);
                                // })
                                // .catch((err) => console.error(err));
        },
         async fetchType () {
            let res = await axios.get('/propertytype')
            if (res.data) {
                this.typeList = res.data.types
            }
        }
    }
}
</script>