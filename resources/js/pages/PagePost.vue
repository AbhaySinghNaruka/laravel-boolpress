<template>
    <div v-if="objPost">
        <h1>{{ objPost.title }}</h1>
        <h2>Nella categoria: {{ objPost.category.name }}</h2>
        <div class="tags">
            <span v-for="tag in objPost.tags" :key="tag.id" class="tag">{{ tag.name }}</span>
        </div>
        <img :src="'/storage/' + objPost.uploaded_img" :alt="objPost.title">
        <p>
            {{ objPost.content }}
        </p>
    </div>
</template>

<script>
export default {
    props: [
        'slug',
    ],
    data() {
        return {
            objPost: null,
        }
    },
    created() {
        axios.get('/api/posts/' + this.slug)
            .then(response => this.objPost = response.data.results);
    }
}
</script>

<style lang="scss" scoped>
    .tag {
        display: inline-block;
        margin: .3em;
        padding: .4em .6em;
        border-radius: 10em;
        background-color: salmon;
    }
</style>
