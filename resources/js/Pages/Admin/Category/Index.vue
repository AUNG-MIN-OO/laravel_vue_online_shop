<template>
    <Master>
        <template slot="header">
            All Categories
        </template>
        <template slot="body">
            <inertia-link href="/admin/category/create" class="btn btn-primary mb-2">Create New</inertia-link>
            <table class="table table-striped table-hover table-dark mb-3">
                <thead>
                <tr>
                    <th>name</th>
                    <th>actions</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="c in categories.data" :key="c.id">
                    <td class="text-capitalize">{{c.name}}</td>
                    <td>
                        <inertia-link :href="`/admin/category/${c.id}/edit`" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></inertia-link>
                        <inertia-link href="" class="btn btn-sm btn-danger" @click="destroy(c.id)"><i class="fas fa-trash"></i></inertia-link>
                    </td>
                </tr>
                </tbody>
            </table>
            <Pagination :data="categories.links"></Pagination>
        </template>
    </Master>
</template>

<script>
import Master from "../Layout/Master";
import Pagination from "../../Share/Pagination";
export default {
    props:{categories:Object},
    name: "Index",
    components: {Master,Pagination},
    methods: {
        destroy(id) {
            this.$swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    const data = {id , _method: "DELETE"};
                    this.$inertia.delete('category/'+id, data)
                }
            })
        }
    },
}
</script>

<style scoped>

</style>
