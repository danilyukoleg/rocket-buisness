<script setup>

import {useForm} from "@inertiajs/vue3";
import axios from "axios";
import {reactive} from "vue";

const form = useForm({
	nn1: sessionStorage.nn1 ?? "",
	nn2: sessionStorage.nn2 ?? "",
	date: sessionStorage.date ?? "",
	time: sessionStorage.time ?? ""
});

const result = reactive({
	nn1: "",
	nn2: ""
});


const getCities = function (value) {
	if (value === "nn1") {
		axios.post(`/api/${value}`, {
			nn1: form.nn1
		})
			.then(response => {
				const resCities = response.data.filter((item, index, arr) => {
					return arr.indexOf(item) === index;
				})

				result.nn1 = resCities;
			})
	}

	if (value === "nn2") {
		axios.post(`/api/${value}`, {
			nn2: form.nn2
		})
			.then(response => {
				const resCities = response.data.filter((item, index, arr) => {
					return arr.indexOf(item) === index;
				})

				result.nn2 = resCities;
			})
	}
}

const submit = function () {
	form.get('/tickets/search');
	sessionStorage.setItem("nn1", form.nn1);
	sessionStorage.setItem("nn2", form.nn2);
	sessionStorage.setItem("date", form.date);
	sessionStorage.setItem("time", form.time);
}

</script>

<template>
    <form @submit.prevent="submit" class="flex flex-col  md:flex-row items-center md:items-start  md:space-x-4">
       <div>
	       <input :class="{active: $page.props.errors.nn1}" v-model="form.nn1" @input="getCities('nn1')" list="citiesOne" type="text" class="p-4 border rounded-md w-full md:w-48" placeholder="Откуда">
	       <datalist  id="citiesOne">
		       <option v-for="result in result.nn1" :value="result.nn1" :key="result.nn1">{{ result.nn1 }}</option>
	       </datalist>
       </div>

	    <div>
		    <input :class="{active: $page.props.errors.nn2}" v-model="form.nn2" list="citiesTwo" @input="getCities('nn2')" type="text" class="p-4 border rounded-md w-full md:w-48" placeholder="Куда">
		    <datalist  id="citiesTwo">
			    <option v-for="result in result.nn2" :value="result.nn1" :key="result.nn2">{{ result.nn2 }}</option>
		    </datalist>
	    </div>
        <input :class="{active: $page.props.errors.date}" v-model="form.date" type="date" class="p-4 border rounded-md w-full md:w-48">
	    <input :class="{active: $page.props.errors.time}" v-model="form.time" type="time" class="p-4 border rounded-md w-full md:w-48">
        <button class="bg-blue-500 text-white p-4 rounded-md w-full md:w-auto">Найти билеты</button>
    </form>
</template>
{{}}
<style>

.active {
	border: 3px solid red;
}


</style>
