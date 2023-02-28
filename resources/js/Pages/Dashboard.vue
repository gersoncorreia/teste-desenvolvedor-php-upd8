<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import TableListClient from '@/Components/TableListClient.vue';
import { Head } from '@inertiajs/vue3';
import axios from 'axios';
import { onMounted, reactive } from 'vue';
const form = {
    'name': '',
    'cpf': '',
    'date_birth': '',
    'sex': '',
    'state': '',
    'city': '',
}
let states = reactive([]);

onMounted(() => {
    axios.get('https://servicodados.ibge.gov.br/api/v1/localidades/estados?orderBy=nome').then(function (response) {
        response.data.forEach(element => {
            states.push(element)
        });
    });
})

</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <div class="py-12">
            <div class="max-w-8xl mx-auto sm:px-6 ">
                <div class="py-2">
                    <form action="">
                        <div class="max-w-full mx-auto sm:px-6 ">
                            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                <div class="p-4 text-gray-900 flex flex-wrap">
                                    <div class="mr-2">
                                        <InputLabel for="cpf" value="CPF" />
                                        <TextInput id="name" type="text"
                                            class=" block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                            v-model="form.cpf" autofocus autocomplete="form.cpf" />
                                    </div>
                                    <div class="mr-2">
                                        <InputLabel for="name" value="Nome" />
                                        <TextInput id="name" type="text"
                                            class=" block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                            v-model="form.name" autofocus autocomplete="name" />
                                    </div>
                                    <div class="mr-2">
                                        <InputLabel for="date_birth" value="Data de Nascimento" />
                                        <TextInput id="date_birth" type="date"
                                            class=" block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                            v-model="form.date_birth" />
                                    </div>
                                    <div class="mr-2">
                                        <InputLabel for="sex" value="Sexo" />
                                        <div class="p-2 block w-full">
                                            <input type="radio" id="sex" name="sex" value="male"> Male
                                            <input type="radio" id="sex" name="sex" value="memale"> Female
                                        </div>
                                    </div>

                                    <div class="mr-2">
                                        <InputLabel for="state" value="Estado" />
                                        <select style="width: 100px;" v-model="form.state" id="state" name="state"
                                            class=" block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                            <option v-for="state in states" :value="state.sigla">{{ state.sigla }}</option>
                                        </select>

                                    </div>
                                    <div class="mr-2">
                                        <InputLabel for="city" value="Cidade" />
<!--                                         <select style="width: 210px;" v-model="form.city" id="city" name="city"
                                            autocomplete="city-name"
                                            class=" block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                            <option>Rio Branco</option>
                                            <option>Cruzeiro do Sul</option>
                                        </select> -->
                                        <TextInput id="city" type="text"
                                        class=" block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                        v-model="form.city" required />
                                    </div>
                                    <div class="grid grid-cols-2 gap-1 mt-5">
                                        <button type="submit"
                                            class="w-28 h-9 bg-blue-500 text-white  font-semibold rounded shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75">
                                            <div class="flex">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-1">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                                                </svg>
                                                Pesquisar
                                            </div>
                                        </button>
                                        <button type="submit"
                                            class="w-20 h-9  bg-gray-500 text-white  font-semibold rounded shadow-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-opacity-75">
                                            <div class="flex">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-1">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                </svg>
                                                limpar
                                            </div>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="bg-white shadow-sm sm:rounded-lg p-6 flex align-baseline justify-center">
                    <TableListClient />
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
