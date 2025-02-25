 <template>
    <div>
        <h1>Edit Clothing Item</h1>
        <form @submit.prevent="submit">
            <input v-model="form.name" placeholder="Name" required />
            <input v-model="form.category" placeholder="Category" required />
            <textarea v-model="form.description" placeholder="Description"></textarea>
            <button type="submit">Update</button>
        </form>
    </div>
</template>

<script>
export default {
    props: {
        clothingItem: Object,
    },
    data() {
        return {
            form: {
                name: this.clothingItem.name,
                category: this.clothingItem.category,
                description: this.clothingItem.description,
            },
        };
    },
    methods: {
        submit() {
            this.$inertia.put(`/clothing-items/${this.clothingItem.id}`, this.form);
        },
    },
};
</script>