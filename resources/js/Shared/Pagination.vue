<template>
    <div>
        <Component :is="link.url?'Link':'span'" v-for="link in links" :href="link.url" v-html="link.label"
                   class="px-1" :class="{'text-gray-500':!link.url,'font-bold':link.active}"
        />
        <!--    <template v-for="link in users.links">
                <Link :href="link.url" v-html="link.label" v-if="link.url"/>
                <span v-else v-html="link.label
            </template>-->
    </div>
</template>

<script>
export default {
   props:{
       links:Array
   }
}
</script>

<style scoped>

</style>
