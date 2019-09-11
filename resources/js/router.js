import Vue from 'vue'
import VueRouter from 'vue-router'

import Property from './components/CreareProperty';

Vue.use(VueRouter)

const routes = [

    {
        path : '/dashbord/property',
        component : Property,
    },
  

]