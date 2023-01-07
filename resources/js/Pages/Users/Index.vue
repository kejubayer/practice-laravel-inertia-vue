<template>
    <Head title="Users"></Head>
    <div class="flex justify-between mb-6">
        <div class="flex items-center">
            <h1 class="text-3xl">Users</h1>
            <Link href="/users/create" class="text-blue-500 text-sm pl-3">New User</Link>
        </div>
        <input v-model="search" type="text" class="border px-2 rounded-lg" placeholder="Search......">
    </div>
    <table class="border table table-auto w-full">
        <thead>
        <tr>
            <!--            <th class="border px-4 py-2">#</th>-->
            <th class="border px-4 py-2">Name</th>
            <th class="border px-4 py-2">Actions</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="(user,index) in users.data" :key="user.id">
            <!--            <td class="border px-4 py-2 w-5 text-center">{{ index + 1 }}</td>-->
            <td class="border px-4 py-2">
                <div>
                    <div class="text-sm font-medium text-gray-900">
                        {{ user.name }}
                    </div>
                </div>
            </td>
            <td class="border px-4 py-2 whitespace-nowrap text-center text-sm font-medium w-10">
                <Link :href="`/users/${user.id}/edit`" href="" class="text-indigo-600 hover:text-indigo-900">Edit</Link>
            </td>
        </tr>
        </tbody>
    </table>
    <!--paginator start-->
    <Pagination :links="users.links" class="mt-6"/>
    <!--paginator end-->

</template>
<script setup>
import Pagination from "../../Shared/Pagination.vue";
import {ref, watch} from "vue";
import {Inertia} from "@inertiajs/inertia";

let props = defineProps({
    users: Object,
    filters: Object
})


let search = ref(props.filters.search);
watch(search, value => {
    Inertia.get('/users', {search: value}, {
        preserveState: true,
        replace:true
    });
});
</script>
