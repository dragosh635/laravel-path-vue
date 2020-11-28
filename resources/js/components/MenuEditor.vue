<template>
    <div>
        <h1>Menu Editor</h1>
        <router-link :to="{name: 'categories'}">Categories</router-link>
        <router-link :to="{name: 'items'}">Items</router-link>
        <router-link :to="{name: 'add-item'}">Add Item</router-link>
        <router-view></router-view>
    </div>
</template>

<script>
import VueRouter from 'vue-router';
import CategoryManager from "./CategoryManager";
import MenuItem from "./MenuItem";
import MenuItemsList from "./MenuItemsList";
import store from "../store/index";

export default {
    name: "MenuEditor",
    store,
    props: ['categories'],
    created() {
        // set the categories when the component is created
        this.$store.commit( 'SET_CATEGORIES', _.cloneDeep( this.categories ) );
    },
    router: new VueRouter( {
        mode: 'history',
        base: 'menu-editor',
        routes: [
            {
                path: '/categories',
                name: 'categories',
                component: CategoryManager
            },
            {
                path: '/',
                redirect: {name: 'categories'},
            },
            {
                path: '/items',
                name: 'items',
                component: MenuItemsList,
            },
            {
                path: '/edit-item/:id',
                name: 'edit-item',
                component: MenuItem,
                props: true
            },
            {
                path: '/add-item',
                name: 'add-item',
                component: MenuItem
            },
            {
                path: '*',
                redirect: '/'
            }
        ]
    } )

}
</script>

<style scoped>
a {
    border: 1px solid black;
    padding: 10px;
    margin: 0;
}

.router-link-active {
    font-weight: bold;
    border-bottom: none;
}
</style>
