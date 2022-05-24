# Pedidos por whatsApp

Application to make orders and send them by whatsapp API. Design based on Single Page Applications. Created in php lenguage for use in shared hosting. Intended for free use.

User interface `desktop` version

![deploy UI desktop](./git-resources/home-desktop.png)

User interface `mobile` version

![deploy UI mobile](./git-resources/home-mobile.png)

## Working

![working desktop](./git-resources/working-desktop.gif)

Mobile version working

![working mobile](./git-resources/working-mobile.gif)

## How it works

Save the product id and weight selected or pieces selected in a cookie called CartJS created by JS code, if product already exists it added the new weith or piece to older one.
> Cookie value

```javascript
[{"id":1,"kg":100},{"id":5,"kg":100}]
```

In the form just recover basic information for the user and aditional instructions. When send order clicked use php code to concatenate url from whatsapp api <https://api.whatsapp.com/send?phone=phoneNumber&text=contentText>

Order structure

![order structure](./git-resources/to-whatsapp.jpg)

Order sended

![order sended](./git-resources/sended.jpg)

## Database structure

**Restructuring, working but not scalable**

Using MySQL for dev and deploy (shared hosting).
Database just save products and categories, dont need to save orders or users info.

![order sended](./git-resources/db-categories.jpg)

![order sended](./git-resources/db-products.jpg)

## For the next version

- Implementing admin dashboard
  - Simply authentication panel
  - Products and categories CRUD
  - Data modification telephone, logo, icon...
- Easy admin account creation, anyone will be able to use the store on their own servers.
  - Config php file
  - Data base creation
  - Demo store
  - User cretentials settings
- Unlock pickup and schedule order
- Improve UI/UX
