<template>
    <div>
        <div class="route-message" v-if="routeMessage">{{ routeMessage }}</div>
        <div>
            <button class="create-button" @click="createCourse">Créer une journée de formation</button>
        </div>
    </div>
</template>

<script setup lang="ts">
import {useRouter} from 'vue-router';
import useTrainings from '../../composables/trainings';
import {ref} from 'vue';

const router = useRouter();
const {message} = useTrainings();

let routeMessage = ref(router.currentRoute.value.params.message);

const createCourse = () => {
    router.push({name: 'create-training'});
};

</script>

<style scoped>
.create-button {
    margin-top: 100px;
    margin-left: 100px;
    background-color: #1C3356;
    color: #fff;
    border: none;
    cursor: pointer;
    padding: 10px 20px;
    font-size: 16px;
    border-radius: 5px;
    transition: background-color 0.3s;
}

.create-button:hover {
    background-color: #1C3356;
}

.route-message {
    margin-left: auto;
    margin-right: auto;
    margin-top: 20px;
    background-color: #64d268;
    color: #ffffff;
    text-align: center;
    padding: 10px;
    font-size: 16px;
    width: 40%;
}
</style>

