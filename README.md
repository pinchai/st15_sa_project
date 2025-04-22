### Layout Manager
```
@extends('master')
@yield('content')
@section('content')
```
### Project module
````
++ Romdul Sport ++ 3k
 - Admin panel
  - branch
  - user
  - category
  - supplier
  - customer
  - pitch
  - product or service
  - Inventory (Basic level)
   - purchase
  - POS Screen
   - sale (pitch, product, service)
  - Booking panel
   - pitch
 - Landing page
   - link booking
 - Notification
  - telegram bot
 +------------------------+

 + Technology
  - Web app (google chrome)
   - Laravel(PHP)
   - Mysql
   - Vue JS
   - Bootstrap
   - Axis
   - API
   - Github
  - Desktop or Laptop
   - CPU: Core I3 ++
   - Ram: 8GB ++
   - SSD 256GB++
   - Windows 10 | Mac | Linux
   - Terminal Printer (80mm)
   - Monitor 13" ++
  - Runtime(online or offline)
------------------------------------------------------------------
- Admin panel
 + branch
  - id*
  - name*
  - location*
  - logo
  - contact*

 + user
  - id*
  - branch_id*
  - name*
  - phone
  - password*
  - profile

 + supplier
  - id*
  - name*
  - phone*
  - address
  
 + customer
  - id*
  - name*
  - phone*
  - alt_phone
  - address
  
 - pitch
  - Id*
  - name*
  - size(5,6,7,10,11)
  - image

 + pitch_booking
  - id*
  - pitch_id*
  - customer_id*
  - date
  - from_time
  - to_time
  - remark

 + category
  - id*
  - name*

 + product or service
  - id*
  - name*
  - cost*
  - price*
  - category_id*
  - description
  - image
  - stock
  - track_stock (true, false)

 + purchase
  - id
  - supplier_id*
  - date
  - grand_total
  - paid

 + purchase_item
  - id*
  - purchase_id*
  - product_id*
  - qty*
  - cost*
  - sub_total*

 + sale (pitch, product, service, customer)
 + Booking panel
  - pitch
````

# st15_sa_project
