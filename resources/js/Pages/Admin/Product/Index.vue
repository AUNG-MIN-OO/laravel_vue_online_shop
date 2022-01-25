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
                    <th>Image</th>
                    <th>name</th>
                    <th>price</th>
                    <th>actions</th>
                </tr>
                </thead>
                <tbody>
                    <tr v-for="p in products.data" :key="p.id">
                        <td>
                            <img :src="`/${p.image}`" alt="" width="50" class="rounded">
                        </td>
                        <td>{{p.name}}</td>
                        <td>{{p.price}}</td>
                        <td>
                            <inertia-link :href="`/admin/product/${p.id}`" class="btn btn-sm btn-warning"><i class="fas fa-eye"></i></inertia-link>
                            <inertia-link :href="`/admin/product/${p.id}/edit`" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></inertia-link>
                            <inertia-link href="" class="btn btn-sm btn-danger" @click="destroy(p.id)"><i class="fas fa-trash"></i></inertia-link>
                        </td>
                    </tr>
                </tbody>
            </table>
            <Pagination :data="products.links"></Pagination>
        </template>
    </Master>
</template>

<script>
import Master from "../Layout/Master";
import Pagination from "../../Share/Pagination";
export default {
    props:{products:Object},
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
                    this.$inertia.delete('product/'+id, data)
                }
            })
        }
    },
}
</script>

<style scoped>

</style>
