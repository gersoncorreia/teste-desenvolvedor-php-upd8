<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import { Swal } from 'sweetalert2';
import { onMounted, reactive } from 'vue';

let states = reactive([]);

onMounted(() => {
    axios.get('https://servicodados.ibge.gov.br/api/v1/localidades/estados?orderBy=nome').then(function (response) {
        response.data.forEach(element => {
            states.push(element)
        });
    });
})

const form = useForm({
    name: '',
    cpf: '',
    date_birth: '',
    sex: '',
    address: '',
    state: '',
    city: '',
});

const submit = () => {
    form.post(route('client.store'), {
        onSuccess: () => form.reset(),
        onError: () => passwordInput.value.focus(),
    });
};

</script>

<template>
    <Head title="Cliente" />
    <AuthenticatedLayout>
        <div class="py-6">
            <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <form @submit.prevent="submit">
                            <Transition enter-from-class="opacity-0" leave-to-class="opacity-0"
                                class="mb-5 rounded-md transition ease-in-out">
                                <p v-if="form.recentlySuccessful" class="bg-green-300 w-full p-2  text-sm text-gray-700">
                                    Cliente cadastrado com
                                    sucesso!</p>
                            </Transition>
                            <div class="grid grid-cols-12 gap-2">

                                <div class="col-span-6 sm:col-span-5">
                                    <InputLabel for="name" value="Nome" />

                                    <TextInput id="name" type="text"
                                        class=" block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                        v-model="form.name" required autofocus autocomplete="name" />
                                    <InputError class="mt-2" :message="form.errors.name" />
                                </div>

                                <div class="col-span-6 sm:col-span-2">
                                    <InputLabel for="cpf" value="CPF" />

                                    <TextInput id="cpf" type="text"
                                        class=" block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                        v-model="form.cpf" required />

                                    <InputError class="mt-2" :message="form.errors.cpf" />
                                </div>

                                <div class="col-span-6 sm:col-span-2">
                                    <InputLabel for="date_birth" value="Data de nascimento" />
                                    <TextInput id="date_birth" type="date"
                                        class=" block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                        v-model="form.date_birth" required />

                                    <InputError class="mt-2" :message="form.errors.date_birth" />
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <InputLabel for="sex" value="Sexo" />
                                    <div class="p-2 block w-full">
                                        <input type="radio" id="sex" value="male" v-model="form.sex"> Male
                                        <input type="radio" id="sex" value="memale" v-model="form.sex"> Female
                                    </div>
                                    <InputError class="mt-2" :message="form.errors.sex" />
                                </div>

                                <div class="col-span-6 sm:col-span-5">
                                    <InputLabel for="address" value="Endereço" />

                                    <TextInput id="address" type="text"
                                        class=" block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                        v-model="form.address" required />

                                    <InputError class="mt-2" :message="form.errors.address" />
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <InputLabel for="state" value="Estado" />
                                    <select v-model="form.state" id="state" name="state"
                                        class=" block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                        <option v-for="state in states" :value="state.sigla">{{ state.nome }} - {{ state.sigla }}</option>
                                    </select>
<!--                                     <TextInput id="cpf" type="text"
                                        class=" block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                        v-model="form.state" required /> -->
                                    <InputError class="mt-2" :message="form.errors.state" />
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <InputLabel for="city" value="Cidade" />

                                    <TextInput id="cpf" type="text"
                                        class=" block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                        v-model="form.city" required />

                                    <InputError class="mt-2" :message="form.errors.city" />
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                        Register
                                    </PrimaryButton>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </AuthenticatedLayout>
</template>
