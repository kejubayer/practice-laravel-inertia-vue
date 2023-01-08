<template>
    <Head title="Login"></Head>
    <main>
        <section class="bg-gray-200 h-screen flex items-center justify-center">
            <form @submit.prevent="submit" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 w-full max-w-xs">
                <div class="flex items-center">
                    <h2 class="text-3xl mx-auto">Login</h2>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                        Email
                    </label>
                    <input v-model="form.email" name="email"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="email" type="email" placeholder="Email">
                    <div v-if="form.errors.email" v-text="form.errors.email" class="text-red-500 text-xs mt-1"></div>

                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                        Password
                    </label>
                    <input v-model="form.password" name="password"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                        id="password" type="password" placeholder="******************">
                    <div v-if="form.errors.password" v-text="form.errors.password" class="text-red-500 text-xs mt-1"></div>

                </div>
                <div class="flex items-center">
                    <button
                        class="mx-auto bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="submit" :disabled="form.processing">
                        Sign In
                    </button>
                </div>
            </form>
        </section>
    </main>
</template>

<script>
export default {
    layout:null
}
</script>

<script setup>
import {useForm} from "@inertiajs/inertia-vue3";

let form=useForm({
    email:'',
    password:''
})
let submit = ()=>{
    form.post('/login');
}

</script>

<style scoped>

</style>
