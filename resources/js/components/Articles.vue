<template>
    <div>
        <h2>Articles</h2>
        <div class="mt-2">
            <add-edit-article v-bind:detail="{id: article.id, title: article.title, body: article.body, edit: edit, article_id: article_id}"></add-edit-article>
        </div>
        <div class="mt-3">
            <pagination v-bind:pagination="pagination"></pagination>
        </div>
        <div class="card card-body mb-2" v-for="article in articles" v-bind:key="article.id">
            <h3>{{ article.title }}</h3>
            <p>{{ article.body }}</p>
            <hr>
            <p>
                <buttons v-bind:detail="{id: article.id, title: article.title, body: article.body, edit: edit}"></buttons>
            </p>
        </div>
    </div>
</template>

<script>
import Vue from 'vue';
import Pagination from './Pagination.vue';
import Buttons from './Buttons.vue';
import AddEditArticle from './AddEditArticle.vue';

Vue.component('pagination', Pagination);
Vue.component('buttons', Buttons);
Vue.component('add-edit-article', AddEditArticle);

    export default {
        name: 'Articles',
        data() {
            return {
                articles: [],
                article: {
                id: '',
                title: '',
                body: ''
                },
                article_id: '',
                pagination: {},
                edit: false,
                detail: {}
            }
        },
        created() {
            this.fetchArticles()
        },
        methods: {
            fetchArticles(page_url) {
                let vm = this;
                page_url = page_url || '/api/articles';
                fetch(page_url)
                    .then(res => res.json())
                    .then(res => {
                        this.articles = res.data,
                        vm.makePagination(res.meta, res.links);
                    })
                    .catch(err => console.log(err));
            },
            makePagination(meta, links) {
                let pagination = {
                    current_page: meta.current_page,
                    last_page: meta.last_page,
                    next_page_url: links.next,
                    prev_page_url: links.prev
                };

                this.pagination = pagination;
            },
            deleteArticle(article) {
                let conf = confirm('Delete: "' + article.title + '"')
                if (conf) {
                    fetch(`api/article/${article.id}`, {method: 'delete'})
                        .then(res => res.json())
                        .then(data => {
                            alert('Article Removed');
                            this.fetchArticles();
                        })
                        .catch(err => {console.log(err)})
                }
            },
            editArticle(article) {
                this.edit = true;
                this.article.title = article.title;
                this.article.body = article.body;
                this.article.id = article.id;
                this.article_id = article.id;
            }
        }
    }
</script>
