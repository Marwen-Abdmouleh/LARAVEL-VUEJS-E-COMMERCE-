<template>
    <div class="container">
        <h2 class="text-center">Update categorie</h2>

        <div class="row">
            <div class="col-md-12">
                <router-link :to="{ name: 'CategorieHome' }" class="btn btn-primary btn-sm float-right mb-2">
                    Back
                </router-link>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form>

                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" v-model="categorie.nom">
                    </div>
            
                    <button type="button" class="btn btn-primary" @click="updateCaregorie()"> Update </button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                categorie: {}
            }
        },
        mounted() {
            this.editCategorie(this.$route.params.categorieId);
        },
        methods: {
            editCategorie(categorieId) {
                this.axios.get(`http://127.0.0.1:8000/api/categorie/${categorieId}`)
                .then((res) => {
                    this.categorie = res.data;
                });
            },
            updateCaregorie() {
                this.axios
                    .put(`http://127.0.0.1:8000/api/categorie/${this.$route.params.categorieId}`, this.categorie)
                    .then((res) => {
                        this.$router.push({ name: 'CategorieHome' });
                    });
            }
        }
    }
</script>
<style lang="scss" scoped > 
    
</style>