 <template>
    <div>
        <h1>{{ clothingItem.name }}</h1>
        <p>Category: {{ clothingItem.category }}</p>
        <p>Description: {{ clothingItem.description }}</p>
        <router-link :to="`/clothing-items/${clothingItem.id}/edit`">Edit</router-link>
        <button @click="deleteItem">Delete</button>
    </div>
</template>

<script>
export default {
    props: {
        clothingItem: Object,
    },
    methods: {
        deleteItem() {
            this.$inertia.delete(`/clothing-items/${this.clothingItem.id}`);
        },
    },
};
</script>