# Testing (complete on your own server)

| Test | Expected result | Actual result / evidence |
|---|---|---|
| Add 2 when stock is 10 | Basket contains 2 | |
| Add 11 when stock is 10 | Rejected | |
| Add 6 twice when stock is 10 | Second addition rejected | |
| Enter 0 or negative quantity on products page | Rejected | |
| Change basket quantity to 3 | Total updates | |
| Remove product | Product disappears | |
| Complete order with stock 10 and quantity 3 | Order and items saved; stock becomes 7; basket clears | |
| Stock falls below basket quantity before purchase | Purchase rejected; no partial order | |
