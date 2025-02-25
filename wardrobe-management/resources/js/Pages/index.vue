 <template>
    <div>
        <h1>Clothing Items</h1>
        <router-link to="/clothing-items/create">Create New Item</router-link>
        <ul>
            <li v-for="item in clothingItems" :key="item.id">
                <router-link :to="`/clothing-items/${item.id}`">{{ item.name }}</router-link>
                <router-link :to="`/clothing-items/${item.id}/edit`">Edit</router-link>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    props: {
        clothingItems: Array,
    },
};
</script>