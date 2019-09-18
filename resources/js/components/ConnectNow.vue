<template>
<div class="info container">
    <div class="row">
        <div class="container">
            <h2 class="info-title">REQUEST <span>MORE INFO</span></h2>
            <form action="" @submit.prevent="createInquery">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">First Name </label>
                            <input v-model="inquery.fname" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Last Name </label>
                            <input v-model="inquery.lname" type="text" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input v-model="inquery.email" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Contact Number</label>
                    <input v-model="inquery.contactno" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Message</label>
                    <textarea v-model="inquery.message" class="form-control" cols="30" rows="5"></textarea>
                </div>
                    <button class="con-btn">REQUEST INFO</button>
            </form>
        </div>
    </div>
</div>
</template>

<script>
export default {
   props:{
        inquerydata: {
            type:Array,
            required:true
        },
    },
    data() {
        return {
            list: [],
            inquery: {
                fname: '',
                lname: '',
                email: '',
                contactno: '',
                message: '',
            }
        }
    },
    mounted()
    {
        console.log('mounted');
        if(this.inquerydata)
        {
            this.list = this.inquerydata
        }
    },
    methods: {
        async createInquery(){
            let data = {
                fname: this.inquery.fname,
                lname: this.inquery.lname,
                email: this.inquery.email,
                contactno: this.inquery.contactno,
                message: this.inquery.message,
            }
            console.log(data);
            axios.post('/connect',data)
                .then((res) => {
                    this.inquery.fname = '';
                    this.inquery.lname = '';
                    this.inquery.email = '';
                    this.inquery.contactno = '';
                    this.inquery.message = '';
                    this.list.push(res.data.inquery);
                })
                .catch((err) => console.error(err));
        }
    }
}
</script>

<style>
    .info{
        background:#d9d9d9;
        padding: 3%;
        height: 75%;
        width: 60%;
        border-radius: 10px 10px ; 
        
    }
    .con-btn{
        background: #16a89c;
        color: white;
        width: 80%;
        margin: 0 3% 0 9%;
        padding: 5px;
        border-radius: 10px 10px;
    }
    .info-title
    {
        background: #16a89c;
        color: white;
        border-radius: 10px 10px;
        padding-left: 1%;
    }
</style>