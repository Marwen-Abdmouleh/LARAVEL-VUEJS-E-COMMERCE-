<template>
    <div class="container">
        <h2 class="text-center">Create produit</h2>

        <div class="row">
            <div class="col-md-12">
                <router-link :to="{ name: 'ProduitHome' }" class="btn btn-primary btn-sm float-right mb-2">
                    Back
                </router-link>
            </div>
        </div>


        <div class="row">
<div class="col-md-12">
    <form>

    <div class="form-group">
        <label>Name</label>
        <input type="text" class="form-control" v-model="produit.nom">
    </div>

    <div class="form-group">
        <label>description</label>
        <input type="text" class="form-control" v-model="produit.description">
    </div>

    <div class="form-group">
        <label>prix</label>
        <input type="text" class="form-control" v-model="produit.prix">
    </div>

    <div class="form-group">
        <label>photo</label>
        <input type="text" class="form-control" v-model="produit.photo">
    </div>


<div class="form-group">
    <label >category_id</label>
   <select v-model="produit.category_id"  >
       <option v-for="items in categorie" :key="items.id" :value="items.id" >
            {{ items.nom}}
       </option>
   </select>
</div>


        
        <button type="button" class="btn btn-primary" @click="createProduit()">Create</button>
    </form>
    
</div>
        </div>
    </div>
</template>
<script>
export default {
          data() {
            return {
                produit: {},
                categorie: null 

            }
        },
          mounted() {
           
            this.getCategories();
        },
        methods: {
    
            createProduit() {
           
              this.axios
              .post('http://127.0.0.1:8000/api/produit',this.produit)
              .then(response => {
                   this.$router.push({ name: 'ProduitHome' })
            })
              .catch(error=>{
                  console.log(error) ;
              })
            },

                  getCategories() {
              this.axios
                  .get('http://127.0.0.1:8000/api/categories')
                  .then(response => {
                      this.categorie = response.data;
                  });
            },

            
        }
}
</script>
<style lang="scss" scoped >
    
</style>