<template>
    <Master>
        <template slot="header">Product Detail</template>
        <template slot="body">
            <div class="">
                <div class="text-center">
                    <img :src="`/${product.image}`" alt="" width="300" class="rounded"/>
                </div>
                <div class="mt-4">
                    <table class="table table-dark">
                        <tr>
                            <td>name</td>
                            <td>{{product.name}}</td>
                        </tr>
                        <tr>
                            <td>description</td>
                            <td class="desc ">{{product.description}}</td>
                        </tr>
                        <tr>
                            <td>price</td>
                            <td>{{product.price}} MMK</td>
                        </tr>
                        <tr>
                            <td>viewers</td>
                            <td>{{product.view_count}}</td>
                        </tr>
                        <tr>
                            <td>category</td>
                            <td>
                                <span class="badge badge-success small">{{product.category.name}}</span>
                            </td>
                        </tr>
                    </table>
                </div>
                <inertia-link @click="back" class="btn btn-sm btn-primary float-right mt-3">Go Back</inertia-link>
            </div>
        </template>
    </Master>
</template>

<script>
import Master from "../Layout/Master";
export default {
    props:{product:Object},
    name: "Detail",
    components: {Master},
    methods: {
        back() {
            window.history.back();
        }
    },
}
</script>

<style scoped>
    .table td{
        vertical-align: middle;
        text-transform: capitalize;
        white-space: initial;
    }
</style>
