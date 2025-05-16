## WEB-DEVELOPMENT-TOOLS (API)

[![Youtube][youtube-shield]][youtube-url]
[![Facebook][facebook-shield]][facebook-url]
[![Instagram][instagram-shield]][instagram-url]
[![LinkedIn][linkedin-shield]][linkedin-url]

Thanks for visiting my GitHub account!



### HTML + JS

- [Bootstrap](https://github.com/learnwithfair/web-development-api/tree/main/HTML%2BCSS%2BJS/bootstrap-html)
- [Icon](https://github.com/learnwithfair/web-development-api/tree/main/HTML%2BCSS%2BJS/icon-html)
- [Preloader](https://github.com/learnwithfair/web-development-api/tree/main/HTML%2BCSS%2BJS/preloader-html)
- [Toast](https://github.com/learnwithfair/web-development-api/tree/main/HTML%2BCSS%2BJS/toast-html)
- [Form Wih Pattern](https://github.com/learnwithfair/web-development-api/tree/main/HTML%2BCSS%2BJS/form-pattern-html)
- [Form Field Outline & Placeholder](https://github.com/learnwithfair/web-development-api/tree/main/HTML%2BCSS%2BJS/form-field-outline-placholder)

### jQuery

- [Copy Text](https://github.com/learnwithfair/web-development-api/tree/main/jQuery/copy-text-jquery)
- [Modal](https://github.com/learnwithfair/web-development-api/tree/main/jQuery/modal-jquery)
- [Data-table](https://github.com/learnwithfair/web-development-api/tree/main/jQuery/datatable-jquery)

### PHP

- [Preloader](https://github.com/learnwithfair/web-development-api/tree/main/PHP/preloader-php)
- [CSV-Reader](https://github.com/learnwithfair/web-development-api/tree/main/PHP/csv-php)
- [JWT-Token](https://github.com/learnwithfair/web-development-api/tree/main/PHP/jwt-token-php)
- [Upload Files](https://github.com/learnwithfair/web-development-api/tree/main/PHP/upload)

### Laravel

- [Laravel-manual-signin-authentication](https://github.com/learnwithfair/web-development-api/tree/main/Laravel/loginManualAuthentication)

### Node JS

- [Payment Gateway](https://github.com/learnwithfair/web-development-api/tree/main/Node-js/sslcommerz-payment-gateway-nodejs)
- [Send Mail](https://github.com/learnwithfair/web-development-api/tree/main/Node-js/send-email-with-nodemailer)
- [Sign-in with Google](https://github.com/learnwithfair/mern-google-authentication)
- [Sign-in with Facebook](https://github.com/learnwithfair/mern-facebook-authentication)

### React JS

- [Nestead Function Call](https://github.com/learnwithfair/web-development-api/tree/main/React-js/nestead-function-call)
- [bootstrap-table-with-filtering](https://github.com/learnwithfair/web-development-api/tree/main/React-js/bootstrap-table-with-filtering)
- [React Bootstrap Modal](https://github.com/learnwithfair/web-development-api/tree/main/React-js/modal-demo)

### Laravel Hosting Precedure

1. .htaccess in Root directory

```htaccess
<IfModule mod_rewrite.c> 
   RewriteEngine On
   RewriteRule ^(.*)$ public/$1 [L]
</IfModule>
```
2. .htaccess in public directory

```htaccess
<IfModule mod_rewrite.c>
    <IfModule mod_negotiation.c>
        Options -MultiViews -Indexes
    </IfModule>

    RewriteEngine On

    # Handle Authorization Header
    RewriteCond %{HTTP:Authorization} .
    RewriteRule .* - [E=HTTP_AUTHORIZATION:%{HTTP:Authorization}]

    # Redirect Trailing Slashes If Not A Folder...
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_URI} (.+)/$
    RewriteRule ^ %1 [L,R=301]

    # Send Requests To Front Controller...
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule ^ index.php [L]
</IfModule>

```

#### If you move all files in subfolder like peopleplus then only place below in public directory   as-

```htaccess
<IfModule mod_rewrite.c>
    RewriteEngine On

    # Redirect everything to peopleplus/public/index.php
    RewriteRule ^(.*)$ peopleplus/public/$1 [L]
</IfModule>
```

### WordPress (Plugin)
1. **Sticky Buttons** -> Sticky Social Icon in the sidebar
2. **Floating Notification Bar**, Sticky Menu on Scroll, Announcement Banner, and Sticky Header for Any Theme
– My Sticky Bar (formerly myStickymenu)
3. **Direct checkout**, Add to card redirect, Quick purchase button,
- Ref: https://www.youtube.com/watch?v=KF9Orpo0VRI
4. **For currency change**, Premmerce multi-currency for woocommerce
- ref: https://www.youtube.com/watch?v=RIeSvuNC4rY
5. Safelayout cute **Preloader** 
- Ref: https://www.youtube.com/watch?v=Dz4rYuijgiM
6. **For sticky header**
- ElementsKit Lite
- Sticky Header Effeccts for Elementor 
- ref-> https://www.youtube.com/watch?v=WN_cYl0e-PQ
7. **For scrollable Image**
- HT mega-absollute addons for elementor 
- ref-> https://www.youtube.com/watch?v=qg1VSLqdc8Y

### API testing with Postman
- https://jsonplaceholder.typicode.com/posts

## Follow Me

[<img src='https://cdn.jsdelivr.net/npm/simple-icons@3.0.1/icons/github.svg' alt='github' height='40'>](https://github.com/learnwithfair) [<img src='https://cdn.jsdelivr.net/npm/simple-icons@3.0.1/icons/facebook.svg' alt='facebook' height='40'>](https://www.facebook.com/learnwithfair/) [<img src='https://cdn.jsdelivr.net/npm/simple-icons@3.0.1/icons/instagram.svg' alt='instagram' height='40'>](https://www.instagram.com/learnwithfair/) [<img src='https://cdn.jsdelivr.net/npm/simple-icons@3.0.1/icons/twitter.svg' alt='twitter' height='40'>](https://www.twiter.com/learnwithfair/) [<img src='https://cdn.jsdelivr.net/npm/simple-icons@3.0.1/icons/youtube.svg' alt='YouTube' height='40'>](https://www.youtube.com/@learnwithfair)

<!-- MARKDOWN LINKS & IMAGES -->

[youtube-shield]: https://img.shields.io/badge/-Youtube-black.svg?style=flat-square&logo=youtube&color=555&logoColor=white
[youtube-url]: https://youtube.com/@learnwithfair
[facebook-shield]: https://img.shields.io/badge/-Facebook-black.svg?style=flat-square&logo=facebook&color=555&logoColor=white
[facebook-url]: https://facebook.com/learnwithfair
[instagram-shield]: https://img.shields.io/badge/-Instagram-black.svg?style=flat-square&logo=instagram&color=555&logoColor=white
[instagram-url]: https://instagram.com/learnwithfair
[linkedin-shield]: https://img.shields.io/badge/-LinkedIn-black.svg?style=flat-square&logo=linkedin&colorB=555
[linkedin-url]: https://linkedin.com/company/learnwithfair
