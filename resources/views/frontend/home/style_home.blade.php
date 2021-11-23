<style type="text/css">
    .carousel-indicators{
        bottom: -13px;
    }
	.carousel-images{
		border-radius: 20px;
		margin-right: 10px;
		margin-left: 10px;
		width: 99%;
	}
    /* youtube */
    .youtube1{
        margin-top: 45px;
    }

    #ypt_wrapper {
    width: 100%;
    background: #FFF;
    //color: #000;
    overflow: hidden;
    max-width: 100%;
    box-shadow: 0px 8px 13px rgba(0,0,0,0.5);
    margin-bottom: 1em;
    }

    #ypt_thumbs {
    overflow-y: scroll;
    overflow-x: hidden;
    width: 20%;
    background: #000;
    margin: 0;
    padding: 0;
    height: 0;
    }

    #ypt_thumbs li {
    list-style: none;
    margin: 0;
    position: relative;
    font-size: 0;
    }

    #ypt_thumbs li img{
    width: 100%;
    }

    #ypt_thumbs li p {
    font-family: arial;
    font-size: 10px;
    background: rgba(0, 0, 0, 0.7);
    display: none;
    position: absolute;
    width: 100%;
    height: 100%;
    color: #fff;
    padding: 5%;
    margin: 0;
    }

    #ypt_thumbs li:hover p {
    display: block;
    cursor: pointer;
    }

    #ypt_thumbs .ypt-now-playing p {
    display: block;
    }

    #ypt_thumbs .ypt-now-playing > span::after {
    content: "\25b6  Now playing"; /* A traingle pointing right */
    margin-top: -1em;
    display: block;
    width: 100%;
    padding: 5%;
    background: rgba(0, 0, 0, 0.6);
    color: #fff;
    position: absolute;
    bottom: 0;
    font-size: 10px;
    }

    #ypt_wrapper .video {
    position: relative;
    width: 80%;
    /*height: 0;*/
    padding-bottom: 48.4%;
    float: left;
    }

    #ypt_wrapper .video iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    float:left;
    }

    @media only screen and (max-width : 400px) {
    #ypt_thumbs {
        display: none;
    }
    #ypt_wrapper .video {
        width: 100%;
        padding-bottom: 56.25%;
    }
    }
    .brand{
        width: fit-content;
        margin: auto;
        font-size: 30px;
        margin-bottom: 10px;
    }
    .product_extras a{
        padding: 25px 75px 25px 75px;
    }
    .product_extras{
        height: 50px;
        padding-top: 10px;
    }
    .brand-card{
        border-radius: 10px;
        margin: 1px;
        display: inline-table;
    }
    .brand-card img{
        border-radius: 10px;
    }
    .brand-card:hover{
        -ms-transform: scale(1.5);
        -webkit-transform: scale(1.5);
        transform: scale(1.5);
        -webkit-box-shadow: 0px 0px 10px 3px rgba(0,174,239,1);
        -moz-box-shadow: 0px 0px 10px 3px rgba(0,174,239,1);
        box-shadow: 0px 0px 10px 3px rgba(0,174,239,1);
        z-index: 1;
    }
    .brand-inline{
        width: fit-content;
        margin: auto;
    }
    .new_arrivals .product_extras a{
        padding: 25px 105px 25px 105px;
    }
    .discount-product{
        text-decoration: line-through;
        font-size: 10px;
        color: red;
    }
    .deals_item_price_a{
        text-decoration: line-through;
    }
    .deals_item_name{
        font-size: 23px;
        height: 35px;
        overflow: hidden;
        font-weight: 500;
    }
    .sale-product{
        width: fit-content;
        margin: auto;
        font-size: 35px;
        color: red;
        font-weight: 500;
    }
    /* .available{
        margin: 0;
    } */
    .product_item{
        left: 0;
    }
    .slide-banner{
        padding-top: 110px;
    }
    .product_price{
        font-weight: bold;
    }
    @media only screen and (max-width: 991px){
		.carousel-images{
			width: 100%;
		}
    }
    @media only screen and (max-width: 600px) {
        .youtube1 {
            margin-top: 15px;
        }
        .deals-container{
            background: white;
            height: 390px;
        }
        .slide-banner{
            padding-top: 55px;
        }
        .carousel-control-next{
            padding-top: 56px;
        }
        .carousel-control-prev{
            padding-top: 56px;
        }
        .carousel-images{
            margin: 0;
            border-radius: 5px;
        }
        .deals{
            width: 113%;
            right: 16px;
            padding-top: 70px;
            padding-bottom: 35px;
            margin-top: 5px;
            background: white;
        }
        .deals_title{
            font-size: 10px;
        }
        .deals_slider_nav i{
            font-size: 10px;
            padding: 5px;
        }
        .deals_slider_nav_container{
            margin-top: 2px;
        }
        .deals_content {
            margin-top: 5px;
        }
        .deals_item_name{
            font-size: 15px;
            height: 41px;
        }
        .sale-product{
            font-size: 16px;
        }
        .available_title{
            font-size: 8px;
        }
        .sold_title{
            font-size: 8px;
        }
        .tabs{
            padding: 0;
        }
        .deals_item_price_a{
            font-size: 8px;
        }
        .deals_slider_prev{
            margin: 0;
        }
        .popular_categories{
            padding-top: 20px;
            padding-bottom: 20px;
        }
        .brand-card{
            width: 15%;
        }
        .banner{
            height: 100px;
        }
        .card_media_product{
            width: 47%;
            margin: 5px 0px 5px 5px;
            border: 1px solid rgba(0,0,0,0.12);
            height: 185px;
        }
        .card_media{
            width: 60%;
            float: right;
            position: relative;
            right: 6px;
            z-index: 1;
        }
        .card_media .card-body{
            padding: 0;
        }
        .card_media .card-body p{
            font-size: 10px;
            height: 35px;
            overflow: hidden;
            margin: 0;
        }
        .card_media .card-body a{
            width: 90%;
            padding: 0;
            font-size: 12px;
            z-index: 1;
            margin-top: 10px;
            background: linear-gradient(0deg, rgba(11,241,230,1) 0%, rgba(45,137,253,1) 100%);
            color: black;
        }
        .price_media{
            font-size: 10px;
            color: #007bff;
            font-weight: bold;
        }
        .price_diskon{
            text-decoration: line-through;
            font-size: 7px;
            position: absolute;
            left: 20px;
            bottom: 27px;
            color: red;
        }
        .banner{
            margin-top: 15px;
        }
        .deals_item_category{
            font-size: 14px;
            font-weight: bold;
        }
        .deals_item_category a{
            font-size: 10px;
        }
        .item-category .popular_category_text{
            font-size: 12px;
            margin: 0;
            padding: 5px;
        }
        .item-category .popular_category_image{
            padding: 10px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
            background: linear-gradient(0deg, rgba(11,241,230,1) 0%, rgba(45,137,253,1) 100%);
        }
        .item-category img{
            border: 1px solid rgba(0,0,0,0.12);
            border-radius: 10px;
        }
        .card-body .name-gaming{
            font-size: 10px;
            height: 32px;
            overflow: hidden;
            margin: 0;
        }
        .btn-gaming{
            width: 90%;
            padding: 0;
            font-size: 12px;
            z-index: 1;
            margin-top: 10px;
            background: linear-gradient(0deg, rgba(11,241,230,1) 0%, rgba(45,137,253,1) 100%);
            color: black;
        }
        .body-gaming{
            padding: 0;
        }
        .body-gaming .price_diskon{
            left: 32px;
        }
        .all-product .price_diskon{
            top: 70px;
            left: 57px;
        }
        .all-product{
            position: relative;
            bottom: 15px;
        }
        .img-gaming img{
            width: 80%;
            margin-left: 10%;
        }
        .img-allinone img{
            width: 80%;
            margin-left: 10%;
        }
        .img-gaming{
            height: 180px;
        }
        .img-allinone{
            height: 180px;
        }
        .product-all{
            height: 275px;
        }
        .brand-media span{
            font-size: 20px;
        }
        .brand-media{
            width: fit-content;
            margin: auto;
            margin-top: 10px;

        }
        .name-product-all{
            font-size: 12px;
            padding: 10px;
            height: 50px;
            overflow: hidden;
            margin: 0;
        }
        .price_diskon_product{
            text-decoration: line-through;
            font-size: 8px;
            position: absolute;
            left: 57px;
            bottom: 40px;
            color: red;
        }
        .quality{
            width: 50%;
            padding: 10px;
        }
        .brand-mobile img{
            background: radial-gradient(circle, rgba(91,242,247,1) 0%, rgba(174,197,246,1) 100%);
        }
        body{
            background: radial-gradient(circle, rgba(225,248,249,1) 0%, rgba(238,242,251,1) 100%);
        }
        .category-media .owl-carousel.owl-loaded{
            height: 85px !important;
        }
    }
    .new-arrivals{
        margin-top: 12px;
    }
    .arrivals_slider_item{
        margin-top: 20px;
    }
    /* Small devices (portrait tablets and large phones, 600px and up) */
    @media only screen and (min-width: 600px) {
        .show_media{
            display: none;
        }
    }

    /* Medium devices (landscape tablets, 768px and up) */
    @media only screen and (min-width: 768px) {
        .show_media{
            display: none;
        }
    }

    /* Large devices (laptops/desktops, 992px and up) */
    @media only screen and (min-width: 992px) {
        .show_media{
            display: none;
        }
    }

    /* Extra large devices (large laptops and desktops, 1200px and up) */
    @media only screen and (min-width: 1200px) {
        .show_media{
            display: none;
        }
    }
</style>
