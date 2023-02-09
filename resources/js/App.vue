<template>
    <div>
        <NavBar />
        <h1>Io vengo da App</h1>
        <main>
            <router-view></router-view>
        </main>
        <FooterComponent />


            <h1>Frontoffice in Vue</h1>

            <div class="row g-3">
                <div v-for="post in arrPosts" :key="post.id" class="col-sm-6 col-md-4">
                    <div class="card h-100">
                        <img :src="'/storage/' + post.uploaded_img" class="card-img-top" :alt="post.title">
                        <div class="card-body d-flex flex-column flex-grow-1">
                            <h5 class="card-title">{{ post.title }}</h5>
                            <p class="card-text flex-grow-1">{{ post.excerpt }}</p>
                            <a :href="'/posts/' + post.slug" class="btn btn-primary">Leggi</a>
                        </div>
                    </div>
                </div>

            <!-- navbar -->
            <!-- main -->
            <!-- footer -->
        </div>
    </div>
</template>

<script>
import NavBar from './components/NavBar';
import FooterComponent from './components/FooterComponent';

export default {
    name: 'App',
    components: {
    NavBar,
    FooterComponent,
  },
    data() {
        return {
            arrPosts : [],
        };
    },
    created() {
        axios.get('/api/posts')
        .then(response => this.arrPosts = response.data.results)
    }
}
</script>

<style lang="scss">
    @import '~bootstrap/scss/bootstrap';
</style>
