<template>
    <div>
        <h1>Index dei post</h1>
        <div v-if="results">
            <div class="row g-3">
                <div v-for="post in results.data" :key="post.id" class="col-sm-6 col-md-4">
                    <div class="card h-100">
                        <img :src="'/storage/' + post.uploaded_img" class="card-img-top" :alt="post.title">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ post.title }}</h5>
                            <p class="card-text flex-grow-1">{{ post.excerpt }}</p>
                            <router-link :to="{name: 'postsShow', params: {slug: post.slug}}" class="btn btn-primary">Leggi</router-link>
                            <a :href="/posts/ + post.slug" class="btn btn-danger">Leggi da link (sbagliato)</a>
                        </div>
                    </div>
                </div>
            </div>

            <nav class="mt-4">
                <ul class="pagination">
                    <li
                        class="page-item"
                        :class="{disabled: results.current_page == 1}"
                        @click="changePage(results.current_page - 1)"
                    >
                        <span class="page-link">Previous</span>
                    </li>

                    <li
                        v-for="page in results.last_page"
                        :key="page"
                        class="page-item"
                        :class="{active: results.current_page == page}"
                        @click="changePage(page)"
                    >
                        <span class="page-link" href="">{{ page }}</span>
                    </li>
                    <li
                        class="page-item"
                        :class="{disabled: results.current_page == results.last_page}"
                        @click="changePage(results.current_page + 1)"
                    >
                        <span class="page-link">Next</span>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
  </template>

  <script>
export default {
    data() {
        return {
            results: null,
        }
    },
    methods: {
        changePage(page) {
            axios.get('/api/posts?page=' + page)
                .then(response => this.results = response.data.results);
        }
    },
    created() {
        this.changePage(1);
    }
}
</script>

  <style>
  </style>
