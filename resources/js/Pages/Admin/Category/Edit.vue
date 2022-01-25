<template>
    <Master>
        <template slot="header">
            Edit Category
        </template>
        <template slot="body">
            <inertia-link href="/admin/category" class="btn btn-primary mb-2">All Categories</inertia-link>
            <form @submit.prevent="update">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" class="form-control" :class="{'is-invalid' : errors.name}" v-model="name">
                    <small class="text-danger font-weight-bold" v-show="errors.name">{{'*'+errors.name}}</small>
                </div>
                <button class="btn btn-primary float-right" :class="{'disabled' : loading}">
                    <div v-show="loading" class="spinner-border spinner-border-sm" role="status">
                    </div>
                    Save Changes
                </button>
            </form>
        </template>
    </Master>
</template>

<script>
import Master from "../Layout/Master";
export default {
    props:{errors:Object, category: Object},
    name: "Edit",
    components: {Master},
    data() {
        return {
            name: "",
            loading:false,
        }
    },
    created() {
        this.name = this.category.name;
    },
    methods: {
        update() {
            this.loading = true;
            this.$inertia.put('/admin/category/'+this.category.id,{name : this.name, _method:'PUT'}
                , {
                    onSuccess : ()=>{
                        this.loading = false
                    }
                }
            )
        }
    },
}
</script>

<style scoped>

</style>
