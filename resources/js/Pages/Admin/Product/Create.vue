<template>
    <Master>
        <template slot="header">
            Create New Product
        </template>
        <template slot="body">
            <inertia-link href="/admin/product" class="btn btn-primary mb-2">All Products</inertia-link>
            <form @submit.prevent="store" enctype="multipart/form-data">
<!--                for name-->
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" class="form-control" :class="{'is-invalid' : errors.name}" v-model="name">
                    <small class="text-danger font-weight-bold" v-show="errors.name">{{'*'+errors.name}}</small>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea type="text" id="description" name="description" class="form-control" :class="{'is-invalid' : errors.description}" v-model="description"></textarea>
                    <small class="text-danger font-weight-bold" v-show="errors.description">{{'*'+errors.description}}</small>
                </div>
                <div class="form-group">
                    <label for="category">Choose Category</label>
                    <select name="category" id="category" :class="{'is-invalid' : errors.description}" class="form-control custom-select" v-model="category_id">
                        <option v-for="c in category"
                                :key="c.id"
                                :value="c.id">
                            {{c.name}}
                        </option>
                    </select>
                    <small class="text-danger font-weight-bold" v-show="errors.description">{{'*'+errors.category}}</small>
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="text" id="price" name="price" class="form-control" :class="{'is-invalid' : errors.price}" v-model="price">
                    <small class="text-danger font-weight-bold" v-show="errors.price">{{'*'+errors.price}}</small>
                </div>
                <div class="form-group">
                    <label for="image">Choose Image</label>
                    <input type="file" id="image" name="image" class="form-control" @change="chooseImage" :class="{'is-invalid' : errors.image}">
                    <small class="text-danger font-weight-bold" v-show="errors.image">{{'*'+errors.image}}</small>
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
    props:{errors:Object, category :Array},
name: "Create",
    components: {Master},
    data() {
        return {
            name: "",
            category_id: "",
            image: "",
            description : "",
            price : "",
            loading:false,
        }
    },
    methods: {
        chooseImage(e){
            this.image = e.target.files[0];
        },
        store() {
            this.loading = true;
            const data = new FormData();
            data.append('name',this.name);
            data.append('description',this.description);
            data.append('price',this.price);
            data.append('category',this.category_id);
            data.append('image',this.image);
            this.$inertia.post('/admin/product',data
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
