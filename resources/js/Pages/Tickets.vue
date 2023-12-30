<script setup>

import Layouts from "@/Layouts/Layouts.vue";
import {Head} from "@inertiajs/vue3";
import Form from "@/Components/Form.vue";
import Logo from "@/Components/Logo.vue";
</script>

<template>
	<Head title="Поиск ЖД Билетов" />
	<div class="img__wrap">
		<div class="flex justify-center pt-3">
			<Logo color="#fff"/>
		</div>
		<div class="container flex flex-col justify-center items-center mx-auto p-6 md:p-12">

			<h1 class="text-3xl md:text-4xl text-white font-bold mb-6 mt-20">Поиск ж/д билетов</h1>

			<Form/>

		</div>
	</div>
</template>

<style scoped>
.img__wrap {
	width: 100%;
	height: 100vh;
	background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("/images/images.jpg") center center/cover no-repeat;
}
</style>
