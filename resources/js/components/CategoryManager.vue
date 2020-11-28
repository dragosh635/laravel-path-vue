<template>
    <form @submit.prevent="saveCategories">
        <a @click="addCategory">+Add Category</a>
        <div v-for="( category, index ) in categories" :key="category.id">
            <input type="text" :value="category.name" @input="update( $event, 'name', index )" :ref="category.name"/>
            <input type="number" :value="category.display_order" @input="update( $event, 'display_order', index )"/>
            <a href="" @click="removeCategory( index )" class="remove">Delete</a>
            <div>
                <img v-if="category.image" :src="`/images/${category.image}`" width="100" alt=""/>
                <label v-else>Image</label>
                <input type="text" :value="category.image" @change="update( $event, 'image', index )"/>
            </div>
            <hr/>
        </div>
        <button type="submit">Save</button>
        <div>{{ feedback }}</div>
    </form>
</template>

<script>
export default {
    computed: {
        /**
         * Get the categories from vuex state
         *
         * @returns {[]}
         */
        categories() {
            return this.$store.state.categories;
        },
        /**
         * Get the feedback from vuex state
         *
         * @returns {string}
         */
        feedback() {
            return this.$store.state.feedback;
        }
    },
    methods: {
        /**
         * Delete category event
         *
         * @param index
         */
        removeCategory( index ) {
            if ( confirm( 'Are you sure' ) ) {
                this.$store.dispatch( 'removeCategory', index );
            }
        },
        /**
         * Add a category
         */
        addCategory() {
            this.$store.commit( 'ADD_CATEGORY', {
                id: 0,
                name: '',
                image: '',
                display_order: this.categories.length + 1
            } );
            this.$nextTick( () => {
                window.scrollTo( 0, document.body.scrollHeight );
                this.$refs[''][0].focus();
            } )
        },
        /**
         * Save categories
         * Dispatches an event to vuex state
         */
        saveCategories() {
            this.$store.dispatch( 'saveCategories' );
        },
        /**
         * Update a category
         * Dispatches an event to vuex state
         *
         * @param $event
         * @param property
         * @param index
         */
        update( $event, property, index ) {
            this.$store.commit( 'UPDATE_CATEGORY', {
                index,
                property,
                value: $event.target.value
            } )
        }
    },
}
</script>

<style scoped>
img {
    vertical-align: middle;
}

hr {
    margin-bottom: 30px;
}

</style>
