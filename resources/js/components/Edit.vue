<template>
  <div>                  
    <div class="con">
      <h2>
          Edit Property
      </h2>
      <hr>
      <form @submit.prevent="updateProperty">
        <div class="form-group">
          <label for="" class="mr-4">Image:</label>
          <img :src="formData.image" width="80" height="60" alt="img"/><br>
          <input  @change="onFileChange" type="file" ref="file" class="form-control">  
        </div>
        <div class="row">
          <div class="col-sm-8">
            <label for="">Title</label>
            <input v-model="formData.title" type="text" class="form-control">
          </div>
          <div class="col-sm-4">
            <label for="">Price</label>
            <input v-model="formData.price" type="text" class="form-control">
          </div>
        </div>
        <div class="form-group">
          <label for="">Action</label><br>  
          <div class="form-control">
            <input v-model="formData.action" class="ml-3" type="radio" value="Rent" name="rentalType">Rent
            <input v-model="formData.action" class="ml-3" type="radio" value="sale" name="rentalType">Sale
          </div>
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
            <label for="">Description</label>
            <textarea v-model="formData.description" rows="3" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>  
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
        action:'',
        types:[]
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
      this.selectedTypes = [ ...this.editData.types.map((type) => type.id) ]
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
      let res = await axios.post('/property/' + this.editData.id , property, 
            { headers:
              { 'Content-Type': 'multipart/form-data' }
            })
            .then((res) => {
              this.formData.title = '';
              this.formData.description = '';
              this.formData.image = '';
              this.formData.price = '';
              this.formData.types = '';
              this.list.push(res.data.formData);
            })
            .catch((err) => console.error(err));
    },
    async fetchType ()
   {
    let res = await axios.get('/propertytype')
    if (res.data) {
      this.typeList = res.data.types
    }
   },
  }
}
</script>
<style>
.con {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>