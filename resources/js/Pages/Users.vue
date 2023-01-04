<template>
    <Head title="Users"></Head>
    <h1 class="text-4xl font-bold">Users</h1>
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
import Pagination from "../Shared/Pagination.vue";

defineProps({users: Object})

</script>
