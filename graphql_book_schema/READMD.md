##Overview

GraphQL is a query language designed to build client applications by providing an intuitive and flexible syntax and system for describing their data requirements and interactions.

GraphQL is not a programming language capable of arbitrary computation, but is instead a language used to query application servers that have capabilities defined in this specification. GraphQL does not mandate a particular programming language or storage system for application servers that implement it. Instead, application servers take their capabilities and map them to a uniform language, type system, and philosophy that GraphQL encodes. This provides a unified interface friendly to product development and a powerful platform for tool‐building.

##Design Principles

- Hierarchical
- Product Centric - front-end dev first
- Strong Typing
- Client specified queries
- Introspective

## Operations

- Query - read only fetch
- Mutation - write followed by a fetch
- subscription - long lived request that fetches data in response to source events

## Fields
```
{
  id
  firstName
  lastName
}
```
## Arguments
```
{
  user(id: 4) {
    id
    firstName
    lastName
  }
}
```
## Field Alias
```
{
  user(id: 4) {
    id
    name
    smallPic: profilePic(size: 64)
    bigPic: profilePic(size: 1024)
  }
}
```
*Top level queries are fields as well and so may also be aliased*

## Fragments
Fragments are the primary unit of composition in GraphQL.

Fragments allow for the reuse of common repeated selections of fields, reducing duplicated text in the document. Inline Fragments can be used directly within a selection to condition upon a type condition when querying against an interface or union.

For example, if we wanted to fetch some common information about mutual friends as well as friends of some user:

```
query withFragments {
  user(id: 4) {
    friends(first: 10) {
      ...friendFields
    }
    mutualFriends(first: 10) {
      ...friendFields
    }
  }
}
```
## Introspection

```
{
  __type(name: "User") {
    name
    fields {
      name
      type {
        name
      }
    }
  }
}
```

## Resources
- http://graphql.org/learn/
- https://fgm.gitbooks.io/graphql-for-drupal/
- https://www.graphqlhub.com/
- https://medium.com/google-developer-experts/graphql-and-the-amazing-apollo-client-fe57e162a70c
- https://www.learnapollo.com/