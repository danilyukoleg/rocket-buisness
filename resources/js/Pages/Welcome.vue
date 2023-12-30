<script setup>
import { Head } from '@inertiajs/vue3';
import Layouts from "@/Layouts/Layouts.vue";
import {reactive} from "vue";

const cities = reactive({
	value: []
})


const citiesFunc = async () => {
	await axios.post("/api/cities")
		.then(response => {
			let res = [];
			response.data.forEach(item => {
				res.push(item.nn1);
				res.push(item.nn2);
			})

			const resCities = res.filter((item, index, arr) => {
				return arr.indexOf(item) === index;
			})

			cities.value = resCities;

		});
}

citiesFunc();


</script>

<template>
	<Head title="Главная"/>
	<Layouts>
		<div class="container mx-auto p-4">
			<div class="flex  items-center  w-auto mb-4 space-x-10">
				<h1 class="text-4xl font-bold ">
					Добро пожаловать
				</h1>
				<a href="/tickets" class="flex items-center space-x-2 text-4xl font-bold text-blue-500 hover:text-blue-700">
					<span>Поиск ж/д билетов</span>
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-4 h-4">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
					</svg>
				</a>
				<a href="/all" class="flex items-center space-x-2 text-4xl font-bold text-blue-500 hover:text-blue-700">
					<span>Список всех билетов</span>
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-4 h-4">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
					</svg>
				</a>
			</div>
			<p class="text-lg mb-6">Список доступных городов</p>

			<ul class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
				<li class="p-4 bg-white rounded-md shadow-md" v-for="(item, index) in cities.value" :key="index">
					<h2 class="text-xl font-semibold mb-2">{{ item }}</h2>
				</li>
			</ul>
		</div>

	</Layouts>
</template>


