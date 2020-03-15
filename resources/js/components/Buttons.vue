<template>
    <div>
        <button class="btn btn-warning btn-sm" @click="editArticle()">Edit</button>
        <button class="btn btn-danger btn-sm" @click="deleteArticle()">Delete</button>
    </div>
</template>

<script>
export default {
    name: 'Buttons',
    props: ['detail'],
    methods: {
        deleteArticle() {
            this.$parent.deleteArticle(this.detail);
        },
        editArticle() {
            this.$parent.editArticle(this.detail);
        }
    }
}
</script>
