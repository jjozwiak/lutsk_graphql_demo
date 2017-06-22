<template>
  <div>
    <div>
      <h2>{{ book.title }}</h2>
      <img v-bind:src="book.image" alt="">
      <p v-html="book.author"></p>
      <div v-html="book.body"></div>
    </div>
  </div>
</template>

<script>
  export default {
    data: () => ({ }),
    props: {
      book: {
        type: Object,
        default: function () {
          return { author: '', body: '', image: '' }
        }
      },
    },
  }
</script>
