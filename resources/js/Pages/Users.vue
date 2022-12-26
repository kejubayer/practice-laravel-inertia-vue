<template>
    <Head title="Users"/>
    <h1 class="text-4xl font-bold">Users</h1>
    <table class="table-fixed">
        <thead>
        <tr>
            <th>Song</th>
            <th>Artist</th>
            <th>Year</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>The Sliding Mr. Bones (Next Stop, Pottersville)</td>
            <td>Malcolm Lockyer</td>
            <td>1961</td>
        </tr>
        <tr>
            <td>Witchy Woman</td>
            <td>The Eagles</td>
            <td>1972</td>
        </tr>
        <tr>
            <td>Shining Star</td>
            <td>Earth, Wind, and Fire</td>
            <td>1975</td>
        </tr>
        </tbody>
    </table>
    <ul>
        <li v-for="user in users" :key="user.id" v-text="user.name"></li>
    </ul>

</template>
<script setup>
defineProps({users:Array})

</script>
