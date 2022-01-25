<template>
    <nav aria-label="Page navigation example">
        <ul class="pagination pg-blue float-right">
            <li class="page-item" v-for="(l,index) in data" :key="index" :class="{active:l.active}">
                <inertia-link :href="l.url" class="page-link" :tabindex="index">
                    {{ l.label }}</inertia-link>
            </li>
        </ul>
    </nav>

</template>

<script>
export default {
    name: "pagination",
    props: {data : Array},
}
</script>

<style scoped>

</style>
