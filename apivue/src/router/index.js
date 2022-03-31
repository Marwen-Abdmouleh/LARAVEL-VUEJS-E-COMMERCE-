import {createWebHistory,createRouter} from 'vue-router'

import welcome from '../components/welcome.vue'

import ajout from '../components/categorie/ajout.vue'
import home from '../components/categorie/home.vue'
import modif from '../components/categorie/modif.vue'

import ProduitAjout from '../components/produit/ProduitAjout.vue'
import ProduitHome from '../components/produit/ProduitHome.vue'
import ProduitModif from '../components/produit/ProduitModif.vue'


const routes=[
{path:"/" , component:welcome , name:"welcome" },

    {path:"/categorie" , component:home , name:"CategorieHome"},
        {path:"/ajout", component:ajout,name:"Ajouter"},
        {path:"/modif/:categorieId",component:modif,name:"Modifier"},

    {path:"/produit" , component:ProduitHome , name:"ProduitHome"},
        {path:"/ajoutp", component:ProduitAjout, name:"ProduitAjout"},
        {path:"/modifp", component:ProduitModif, name:"ProduitModif"},

     

]




const router = new createRouter({
    history: createWebHistory(),
    routes: routes
})
export default router;
