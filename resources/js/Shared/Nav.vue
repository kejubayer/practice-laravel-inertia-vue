<template>
    <nav >
        <ul class="list-disc flex list-inside space-x-4">
            <li>
                <NavLink href="/" :active="$page.component==='Home'">Home</NavLink>
            </li>
           <li>
                <NavLink href="/users" :active="$page.component==='Users'">Users</NavLink>
            </li>
            <li>
                <NavLink href="/settings" :active="$page.component==='Settings'">Settings</NavLink>

            </li>

        </ul>
    </nav>
</template>
<script>
import {Link} from "@inertiajs/inertia-vue3";
import NavLink from "./NavLink.vue";


export default {
    components: {NavLink, Link},
};
</script>
