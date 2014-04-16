## TwitterMatcher

## Development


#### Fix for Storage Directory

    (replace USERNAME with your own)
    cd app/ && chown -R USERNAME storage && cd storage/ && find . -type d -exec chmod 777 {} \; && find . -type f -exec chmod 777 {} \;