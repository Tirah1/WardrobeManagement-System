 <template>
    <div>
        <h1>Create Clothing Item</h1>
        <form @submit.prevent="submit">
            <div>
                <label for="name">Name</label>
                <input type="text" v-model="form.name" required>
            </div>
            <div>
                <label for="category">Category</label>
                <input type="text" v-model="form.category" required>
            </div>
            <div>
                <label for="description">Description</label>
                <textarea v-model="form.description"></textarea>
            </div>
            <button type="submit