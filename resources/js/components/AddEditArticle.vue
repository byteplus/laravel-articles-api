<template>
    <div>
        <p>
        <button class="btn btn-info btn-sm" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            Add/Edit Article
        </button>
        </p>
        <div class="collapse" id="collapseExample">
            <h4>Add Article</h4>
            <div class="card card-body">
                <form class="mb-3" @submit.prevent="addArticle">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="input title" v-model="detail.title">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" placeholder="input body" v-model="detail.body"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success btn-sm">Save</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'AddEditArticle',
    props: ['detail'],
    methods: {
        addArticle() {
            if (this.detail.edit === false) {
                // add
                fetch('api/article', {
                    method: 'post',
                    body: JSON.stringify(this.detail),
                    headers: {
                        'content-type': 'application/json'
                    }
                })
                .then(res => res.json())
                .then(data => {
                    alert('Article Added');
                    this.$parent.fetchArticles();
                }).catch(err => console.log(err))
            } else {
                //edit
                fetch('api/article', {
                    method: 'put',
                    body: JSON.stringify(this.detail),
                    headers: {
                        'content-type': 'application/json'
                    }
                })
                .then(res => res.json())
                .then(data => {
                    alert('Article Updated');
                    this.$parent.fetchArticles();
                })
                .catch(err => console.log(err))
            }
        }
    }
}
</script>
