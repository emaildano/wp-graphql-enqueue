# WPGraphQL Enqueue

Automatically add Enqueued Scripts and Styles to WPGraphQL

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