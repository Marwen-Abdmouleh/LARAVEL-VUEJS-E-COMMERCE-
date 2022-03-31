<template>
    <div class="container">
        <h2 class="text-center">Create categorie</h2>

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
        
                    <button type="button" class="btn btn-primary" @click="createCategorie()">Create</button>
                </form>
                
            </div>
        </div>
    </div>
</template>
<script>
export default {
          data() {
            return {
                categorie: { }
            }
        },
        methods: {
            createCategorie() {
           
              this.axios.post('http://127.0.0.1:8000/api/categorie',this.categorie)
                    .then(response => {
                   this.$router.push({ name: 'CategorieHome' })
            })
              .catch(error=>{
                  console.log(error) ;
              })
            }
        }
}
</script>
<style lang="scss" scoped >
    
</style>