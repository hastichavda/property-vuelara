<template>
 <div>
   <div>
     <form @submit.prevent="createType">
       <div class="form-group">
         <label>Type</label>
         <input type="text" class="form-control" v-model="type.name">
       </div>
       <button type="submit" class="btn btn-primary">Add type</button>
     </form>
   </div>
   <div>
     <ul>
       <p v-if="list.length === 0">There is no categories yet!</p>
       <li class="list-group-item" v-for="(type, index) in list" :key="index">
         {{ type.name }}
         <div style="text-align: right">
           <button data-inline="true" @click="deleteType(type.id,index)" class="btn btn-primary">Delete</button>
         </div>
       </li>
     </ul>
   </div>
 </div>
</template>
<script>
export default {
 props: {
   typedata: {
     type: Array,
     required: true
   },
 },
 data() {
   return {
     list: [],
     type: {
       name: ''
     }
   };
 },
 mounted() {
   console.log('mounted');
   if(this.typedata)
   {
     this.list = this.typedata
   }
 },
 methods: {
   async createType()
   {
     let data = {
       name: this.type.name
     }
     console.log(data);
     axios.post('/propertytype',data)
       .then((res) => {
         this.type.name = '';
         this.list.push(res.data.type)
       })
       .catch((err) => console.error(err));
   },
   deleteType(id, index)
   {
     axios.delete('/propertytype/' +id)
       .then((res) => {
         this.list.splice(index,1)
       })
       .catch((err) => console.error(err));
   }
 }
};
</script>