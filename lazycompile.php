<!DOCTYPE html>
{{! 



The Seriously Theme
by A++

Enable Special features with html classes:

fun: Show Comic hands below the add to cart button
fix-header: keep the logo and the nav floating on top


example: <html lang="en" class="fun fix-header"> enables a comic hand and a fixed header … Simple, huh?

    ▼
    ▼
    ▼
    ▼

}}
<html lang="en" class="fix-header fun">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <title>
        {{store_name}}
        {{! Add the label of the current navigation item on list pages }}
        {{#list_page}}{{#navigation}}{{#is_current}}- {{label}}{{/is_current}}{{/navigation}}{{/list_page}}
        {{! Add the product title on product pages }}
        {{#product_page}}{{#product}}- {{title}}{{/product}}{{/product_page}}
        {{! Add "About" on the about page }}
        {{#about_page}}- About{{/about_page}}
    </title>
    <link href="{{assets_url}}/shared/css/base.css" rel="stylesheet" type="text/css">
    <link href='//fonts.googleapis.com/css?family=Allan|Karla:400,700,400italic' rel='stylesheet' type='text/css'>
    <style type="text/css">
        <?php include('assets/css/seriously.css'); ?>
    </style>




    <!--[if lt IE 9]>
    <script src="{{assets_url}}/shared/js/html5shiv.js"></script>
    <![endif]-->

    {{#list_page}}
        <meta property="og:description" content="{{store_description}}" />
        <meta property="twitter:description" content="{{store_description}}" />
    {{/list_page}}

    {{#product_page}}
    <meta property="og:description" content="{{description}}" />
    <meta property="twitter:description" content="{{description}}" />
    {{/product_page}}
</head>

<body class="">
<div id="container">
    <header>
        <a id="logotype" class="{{#no_logotype}}type{{/no_logotype}}" href="{{store_url}}">
            <span class="logo">
            {{#logotype}}
                <img src="{{url-300}}" alt="{{store_name}}">
            {{/logotype}}
            {{#no_logotype}}
                {{store_name}}
            {{/no_logotype}}
            </span>
        </a>
        <ul id="nav">
            <li>
                <a class="{{#about_page}}selected{{/about_page}}" href="{{store_url}}/page/about">
                {{#lang}}About us{{/lang}}
                </a>
            </li>




            {{#navigation}}
            
            <li class="category itemcount{{count}} {{#is_current}}selected{{/is_current}} {{#children?}}children{{/children?}}">
                <a href="{{url}}">
                    {{label}}
                </a>
                {{#is_current}}
                {{! Render the submenu if it has any navigation items }}
                {{#children?}}
                <ul class="child_navigation">
                    {{#children}}
                    <li class="itemcount{{count}} {{#is_current}}selected{{/is_current}}">
                        <a href="{{url}}">
                            {{label}}
                        </a>
                    </li>
                    {{/children}}
                </ul>
                {{/children?}}
                {{/is_current}}
            </li>
            
            {{/navigation}}
            

            

        </ul>
    </header>


{{#list_page}}
{{! This block is rendered when displaying a list of products }}

    <section id="products">
        {{! Output a list if we have any products }}
        {{#products?}}
        
            {{#products}}
                <article class="product" class="list">
                    
                    <div class="left_info">

                        <h1><a href="{{url}}" class="button hand_cursor">{{title}}</a></h1>

                        <div class="description html_content">
                         {{description}}
                        </div>
         
                    </div>

                    <a href="{{url}}" class="image_container hand_cursor">
                        {{#primary_image}}
                            <figure class="responsive" data-media="{{url-300}}" data-media440="{{url-500}}" data-media600="{{url-1000}}" data-media1400="{{url-2000}}" alt="{{title}}">
                                <noscript>
                                    <img src="{{url-1000}}" alt="{{title}}">
                                </noscript>
                            </figure>

                            <!-- <div class="show_more">More Images … </div> -->
                        {{/primary_image}}
                    </a>

                        
                        <section class="details_container">
                            
                            <div class="description html_content">
                                
                                <div class="text compact">
                                    {{description}}
                                </div>
                            
                                <a href="{{url}}" class="price compact">
                                    {{#in_stock}}{{price_with_currency}}{{/in_stock}} {{#out_of_stock}}{{#lang}}Sold Out{{/lang}}{{/out_of_stock}}
                                </a>
                                
<!--                                 <div class="show_more">
                                    {{#add_to_cart}}
                                    <div class="add_to_cart">
                                        {{#add_to_cart_button}}
                                        Add to cart 
                                        {{/add_to_cart_button}}
                                    </div>
                                    {{/add_to_cart}}

                                </div> -->
                                
                            </div>

                        </section>

                </article>
            {{/products}}
        {{/products?}}
    </section>
{{/list_page}}


{{#product_page}}
{{! This block is rendered when displaying a single product }}

    {{#product}}
            <article id="product" class="product" itemscope itemtype="http://schema.org/Product">

                <div class="left_info">

                        <h1>{{title}}</h1>

                        <div class="description html_content">
                         {{description}}
                         <div class="social">
                            {{social_buttons}}
                        </div>
                        </div>

                         
         
                </div>

                <div class="image_container">
                    <ul class="inner">
                    {{#all_images}}<li>
                        <figure class="responsive" data-media="{{url-300}}" data-media440="{{url-500}}" data-media600="{{url-1000}}" data-media1400="{{url-2000}}" alt="{{title}}">
                            <noscript><img src="{{url-1000}}" alt="{{title}}"></noscript>
                        </figure>
                    </li>{{/all_images}}
                    </ul>
                </div>


                <aside class="details_container hand_bg {{#out_of_stock}} unbuyable {{/out_of_stock}}">

                        <div class="price" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                            <span itemprop="price" class="pricedisplay">
                                {{price_with_currency}}
                            </span> 

                            {{#out_of_stock}}
                                <span class="out_of_stock">
                                    {{#lang}}Sold Out{{/lang}}
                                </span>
                            {{/out_of_stock}}

                            {{! This is meta data for search engines etc. }}
                            <meta itemprop="priceCurrency" content="{{currency_code}}">
                            {{#in_stock}}
                            <link itemprop="availability" href="http://schema.org/InStock">
                            {{/in_stock}}
                            {{#out_of_stock}}
                            <link itemprop="availability" href="http://schema.org/OutOfStock">
                            {{/out_of_stock}}
                        </div>


                        {{#add_to_cart}}
                            <div class="variations_container">
                                {{#variations_select}}
                                <label for="variation_id">Choose</label>
                                {{/variations_select}}
                            </div>

                            <div class="add_to_cart">
                                {{#add_to_cart_button}}
                                Add to cart 
                                {{/add_to_cart_button}}
                            </div>

                            <em class="shipping">{{shipping_destinations}}</em><br/>
                        {{/add_to_cart}}


                </aside>
            </article>

            {{! Render a list of related products if there are any }}
            {{#related_products?}}
            <section id="products" class="related">
                <h2 class="rel-divider">{{#lang}}Related{{/lang}}</h2>
                <div class="productlist">
                    {{#related_products}}
                        <article class="product" class="list">
                            
                            <div class="left_info">

                                <h1><a href="{{url}}" class="button hand_cursor">{{title}}</a></h1>

                                <div class="description html_content">
                                 {{description}}
                                </div>
                 
                            </div>

                            <a href="{{url}}" class="image_container hand_cursor">
                                {{#primary_image}}
                                    <figure class="responsive" data-media="{{url-300}}" data-media440="{{url-500}}" data-media600="{{url-1000}}" data-media1400="{{url-2000}}" alt="{{title}}">
                                        <noscript>
                                            <img src="{{url-1000}}" alt="{{title}}">
                                        </noscript>
                                    </figure>
                                {{/primary_image}}
                            </a>

                                
                                <section class="details_container">
                                    
                                    <div class="description html_content">
                                        
                                        <div class="text compact">
                                            {{description}}
                                        </div>
                                        <a href="{{url}}" class="price compact">{{price_with_currency}}</a>

                                    </div>

                                </section>

                        </article>
                    {{/related_products}}
                </div>
            </section>
            {{/related_products?}}

    {{/product}}

{{/product_page}}


{{#about_page}}

    <article id="about" class="page">
        <h1>About</h1>
        <div class="html_content">
            {{store_description}}
        </div>
    </article>

{{/about_page}}
</div>
<footer>


            <a class="{{#about_page}}selected{{/about_page}}" href="{{store_url}}/page/about">
            {{#lang}}About us{{/lang}}
            </a>
            {{#store_blog_url}}
                <a href="{{store_blog_url}}" target="_blank">
                    Blog
                </a>
            {{/store_blog_url}}
            <div id="search_container">
                {{search}}
            </div><br>
            {{#return_policy}}Return Policy{{/return_policy}}
            {{#terms}}Terms &amp; Conditions{{/terms}}

            
</footer>
<div id="bg"></div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript">
        if(typeof window.jQuery !== 'undefined') {
            <?php include('assets/js/seriously.min.js'); ?>
        }
    </script>

     <noscript>
        <style type="text/css">
            figure img,footer {
                opacity: 1;
                -webkit-opacity: 1;
                -moz-opacity: 1;    
                -ms-opacity: 1;    
                -o-opacity: 1;    
            }
        </style>
    </noscript>

</body>
</html>

<!--
Want to create your own Tictail theme?
Check out the documentation at https://tictail.com/docs
-->