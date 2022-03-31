<template>
    <div class="container">
  <h2 class="text-center">Categories List</h2>

<div class="row">
    <div class="col-md-12">
        <router-link :to="{ name: 'Ajouter' }" class="btn btn-primary btn-sm float-right mb-2">
            Add Categories
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
              <th>Actions</th>
          </tr>
          </thead>

    <tbody>
        <tr v-for="(items,index) in categorie " :key="items.id" :ref="setCategorieRef"  >
            <td>{{ items.id }}</td> 
            <td>{{ items.nom }}</td>
  
            <td>
        <router-link class="btn btn-success btn-sm" :to="{ name:'Modifier', params: { categorieId: items.id }}">  Edit
        </router-link>

    <button class="btn btn-danger btn-sm" @click="deleteCategorie(items.id,index)">Delete</button>
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
categorie:{},
categorieRef:[

]
    }
  },
        mounted() {
            this.getCategories();
        },
        methods: {
            setCategorieRef(el){
                if(el && !this.categorieRef.includes(el) ){
                    this.categorieRef.push(el)
                }
            },
            getCategories() {
              this.axios
                  .get('http://127.0.0.1:8000/api/categories')
                  .then(response => {
                      this.categorie = response.data;
                  });
            },
            deleteCategorie(id,i) {
               
                this.axios
                    .delete('http://127.0.0.1:8000/api/categorie/'+id)
                    .then(response => {
                         this.categorieRef[i].remove();

                    // this.getCategories(); 
                  }
                    )
                    .catch(error=>{
                      console.log(error)
                    })
            }
        }
    }

</script>
<style lang="scss" scoped  >
  
</style>