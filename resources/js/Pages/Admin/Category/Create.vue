<template>
    <Master>
        <template slot="header">
            Create Category
        </template>
        <template slot="body">
            <inertia-link href="/admin/category" class="btn btn-primary mb-2">All Categories</inertia-link>
            <form @submit.prevent="store">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" class="form-control" :class="{'is-invalid' : errors.name}" v-model="name">
                    <small class="text-danger font-weight-bold" v-show="errors.name">{{'*'+errors.name}}</small>
                </div>
                <button class="btn btn-primary float-right" :class="{'disabled' : loading}">
                    <div v-show="loading" class="spinner-border spinner-border-sm" role="status">
                    </div>
                    Create Now
                </button>
            </form>
        </template>
    </Master>
</template>

<script>
import Master from "../Layout/Master";
export default {
    props:{errors:Object},
name: "Create",
    components: {Master},
    data() {
        return {
            name: "",
            loading:false,
        }
    },
    methods: {
        store() {
            this.loading = true;
            this.$inertia.post('/admin/category',{name : this.name}
            , {
                onSuccess : ()=>{
                    this.name = "";
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
