<template>
  <div class="feed">
    <template v-if="loading > 0">
      Loading...
    </template>
    <template v-else>
      <ul>
        <li v-for="book in books.entities">
          <book :book='book' class="book"/>
        </li>
      </ul>
    </template>
  </div>
</template>

<script>
  import gql from 'graphql-tag'
  import Book from './Book.vue'

  const NodeQuery = gql `
  {
    books:nodeQuery(filter: {type: "books"}) {
      entities {
        id:entityId
        title:entityLabel
        body
        author:fieldAuthor
        image:fieldCoverPhoto
      }
    }
  }
  `;

  // Component def
  export default {
    // Local state
    data: () => ({
      books: {},
      loading: 0,
    }),
    // Apollo GraphQL
    apollo: {
      books: {
          query: NodeQuery
      }
    },
    components: {
      'book': Book
    }
  }
</script>
