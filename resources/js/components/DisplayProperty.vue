<template>
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Image</th>
                <th scope="col">Title</th>
                <!-- <th scope="col">Description</th> -->
                <th scope="col">Price</th>
                <th scope="col">Type</th>
                <th scope="col">Action</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
        <tr class="list-group-item" v-if='list.length === 0'>There is no Property yet!</tr> 
            <tr v-for="(propertydata,index) in list"
                :key= "index">
                <td scope="row"> 
                    <img :src="propertydata.image" width="50" height="50" alt="img"/>
                </td>
                <td>{{ propertydata.title }}</td>
                <!-- <td>{{ propertydata.description }}</td> -->
                <td>{{ propertydata.price}}</td>
                <ul class="list-group list">
                    <li v-for="(type, index) in propertydata.types" 
                        :key="index">
                        {{ type.name}}
                    </li>
                </ul>
                <td>{{ propertydata.action }}</td>
                <td><a :href="'/property/'+propertydata.id+'/edit'" class="fa fa-pencil-square fa-2x"></a></td>
                <td><i class="fa fa-trash  fa-2x" @click="deleteProperty(propertydata.id,index)"></i></td>
            </tr>
        </tbody> 
    </table>    
</template>
<script>
export default {
    props:{
        displayData: {
            type:Array,
            required: true
        }
    },
    data(){
        return {
            list: []
        }
    },
    mounted () {    
        this.list = this.displayData
    },
    methods:
    {
        async fetchData()
        {
        
         let res = await axios.get('/property')
            console.log(res.data);
            if(res.data)
            {
                this.list = res.data.property;
            }
        },
        deleteProperty(id,index)
        {   
            axios.delete('/property/'+ id)
            .then((res) => {
                this.list.splice(index,1)                
            })
            .catch((err) => console.error(err));
        }
    }
}
</script>

<style>
   .list
   {
       list-style:none;
   }
</style>