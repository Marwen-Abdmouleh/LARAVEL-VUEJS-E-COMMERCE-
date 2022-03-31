<template lang="">
    <div>

    <ul class="nav nav-pills">

 <li class="nav-item">
    <router-link :to="{name :'welcome'}" class="nav-link" active-class="active"  exact >site de vente</router-link>
  </li>

         <li class="nav-item">
    <router-link :to="{name :'CategorieHome'}" class="nav-link" active-class="active"  exact >Categories</router-link>
  </li>

           <li class="nav-item">
    <router-link :to="{name :'ProduitHome'}" class="nav-link" active-class="active"  exact >Produits</router-link>
  </li>




    </div>
</template>
<script>
export default {
    
}
</script>
<style lang="scss" scoped >

</style>