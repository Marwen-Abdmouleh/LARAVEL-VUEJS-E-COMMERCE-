<template>
    <div class="container">
  <h2 class="text-center">Produits List</h2>

<div class="row">
    <div class="col-md-12">
        <router-link :to="{ name: 'ProduitAjout' }" class="btn btn-primary btn-sm float-right mb-2">
            Add Produits
        </router-link>
    </div>
</div>

<div class="row">
  <div class="col-md-12">
    <table class="table">

          <thead>
          <tr>
              <th>id</th> 
              <th>Name</th>
              <th>description</th>
              <th>prix</th>
              <th>photo</th>
              <th>category_id</th>
              <th>Actions</th>
          </tr>
          </thead>

    <tbody>
        <tr v-for="(items,index) in produit " :key="items.id" :ref="setProduitRef" >
            <td>{{ items.id }}</td> 
            <td>{{ items.nom }}</td>
            <td>{{ items.description }}</td>
            <td>{{ items.prix }}</td>
            <td>{{ items.photo }}</td>
            <td>{{ items.category_id }}</td>
  
            <td>
        <router-link class="btn btn-success btn-sm" :to="{ name:'ProduitModif', params: { produitId: items.id }}">  Edit
        </router-link>

    <button class="btn btn-danger btn-sm" @click="deleteProduit(items.id,index)">Delete</button>
            </td>
            <td>
            </td>
        </tr>
    </tbody>

      </table>
      </div>
  </div>
    </div>
    <router-view></router-view>
</template>
<script>
export default {
  data(){
    return{
        produitRef:[],
produit:{},
categorie: null 
    }
  },

        mounted() {
            this.getProduits();
             this.getCategories();
         
        },
        methods: {
               setProduitRef(el){
                if(el && !this.produitRef.includes(el) ){
                    this.produitRef.push(el)
                }
            },
                      getCategories() {
              this.axios
                  .get('http://127.0.0.1:8000/api/categories')
                  .then(response => {
                      this.categorie = response.data;
                  });
            },
            getProduits() {
              this.axios
                  .get('http://127.0.0.1:8000/api/produits')
                  .then(response => {
                      this.produit = response.data.produits;
                      console.log(response.data)
                  });
            },

        
            deleteProduit(id,i) {
                this.axios
                    .delete('http://127.0.0.1:8000/api/produit/'+id)
                    .then(response => {
                        this.produitRef[i].remove();
                   // this.getProduits(); 
                  }
                    )
                    .catch(error=>{
                      console.log(error)
                    })
            }
        }
    }

</script>
<style lang="scss" scoped >
    
</style>