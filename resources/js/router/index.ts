import {createRouter, createWebHistory, RouteRecordRaw} from 'vue-router'

import Vehicles from '@/components/views/Vehicles.vue'
import Learner from '@/components/views/Learner.vue'
import Dashboard from '@/components/views/Dashboard.vue'
import Training from '@/components/views/Training.vue'
import CreateTraining from '@/components/views/CreateTraining.vue'

const routes: Array<RouteRecordRaw> = [
    {
        path: '/vehicles',
        name: 'vehicles',
        component: Vehicles
    },
    {
        path: '/learner',
        name: 'learner',
        component: Learner
    },
    {
        path: '/dashboard',
        name: 'dashboard',
        component: Dashboard
    },
    {
        path: '/training/:message?',
        name: 'training',
        component: Training
    },
    {
        path: '/training/create',
        name: 'create-training',
        component: CreateTraining
    },

];

export default createRouter({
    history: createWebHistory(),
    routes
})
