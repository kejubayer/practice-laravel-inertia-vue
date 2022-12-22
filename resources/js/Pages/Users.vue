<template>
    <Layout>
        <h1 class="text-4xl font-bold">Users</h1>

        <div style="margin-top: 1000px">
            <p>The current time is {{time}}</p>
            <Link href="/users" class="text-blue-500 hover:underline" preserve-scroll >Refresh</Link>

        </div>
    </Layout>

</template>
<script>
import { Link } from "@inertiajs/inertia-vue3";
import Layout from "../Shared/Layout";

export default {
    components:{Layout,Link},
    props:{time:String}
};
</script>
