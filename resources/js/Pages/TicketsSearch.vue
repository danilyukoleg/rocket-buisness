<script setup>
import {Head} from "@inertiajs/vue3";
import Layouts from "@/Layouts/Layouts.vue";
import {reactive} from "vue";
import Form from "@/Components/Form.vue";
defineProps({tickets: Object})

const btn = reactive({
	isActive: false,
	toggle: function () {
		this.isActive = !this.isActive;
	},
	text: function () {
		return this.isActive ? "Отменить поиск" : "Изменить поиск";
	}
})
</script>

<template>
	<Head title="ВСе билеты"/>
	<Layouts>
	<div class="container mx-auto">
		<template v-if="tickets">
			<h1 class="text-4xl font-bold text-center mt-5">
				Ничего не найдено
			</h1>
		</template>
		<button @click="btn.toggle()" type="button" class="flex items-center justify-center mt-5 mb-5 text-blue-400 font-bold text-3xl mx-auto">
			{{  btn.text() }}
		</button>
		<template v-if="btn.isActive">
			<div class="flex justify-center p-10">
				<Form/>
			</div>
		</template>
		<div class="flex flex-col max-w-sm bg-white shadow-md rounded-lg overflow-hidden mx-auto my-4" v-for="ticket in tickets" :key="ticket.id">
			<div class="bg-gray-200 text-gray-700 px-6 py-4">
				<p class="text-lg font-semibold"><strong>Откуда:</strong> {{ ticket.nn1 }}</p>
				<p class="text-lg font-semibold"><strong>Куда:</strong> {{ ticket.nn2 }}</p>
				<p class="text-gray-700"><strong>Дата:</strong> {{ ticket.date }}</p>
				<p class="text-gray-700"><strong>Время:</strong> {{ ticket.time }}</p>
			</div>
		</div>
	</div>
	</Layouts>
</template>

<style scoped>

</style>
