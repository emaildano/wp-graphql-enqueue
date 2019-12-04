# WPGraphQL Enqueue

Automatically add Enqueued Scripts and Styles to WPGraphQL

## Requirements

- [WPGraphQL](https://www.wpgraphql.com/)
- [Pretty Permalinks](https://wordpress.org/support/article/using-permalinks/#mod_rewrite-pretty-permalinks) Enabled

### Example Usage

Query
```
{
  styles {
    edges {
      node {
        handle
        id
        src
      }
    }
  }
}

```
Response
```
 {
  "node": {
    "handle": "common",
    "id": "common",
    "src": "/wp-admin/css/common.min.css"
  }
}
```
