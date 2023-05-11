<?php
function headerHtml($underline){
    echo '
    <!doctype html>
    <html lang="en">
    
    <head>
        <!-- Optional JavaScript -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
        <!-- Font Awsome CDN -->
        <script src="https://kit.fontawesome.com/bd44c94d16.js" crossorigin="anonymous"></script>
    
        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link
            href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates&family=Montserrat:wght@300&family=Ubuntu:wght@700&display=swap"
            rel="stylesheet">
    
    
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
            integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    
        <!-- Custom Styles -->
        <link rel="stylesheet" href="../../css/styles.css" >

        <!--sweet alert CDN-->
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>   
    
        <style>
        
        .'.$underline.'{border-bottom:3px solid white;}

        /* ##################### Radio Button Style start ################## */
        .container {
            display: block;
            position: relative;
            padding-left: 35px;
            margin-bottom: 12px;
            cursor: pointer;
            font-size: 22px;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
          }

          .container input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
          }
          .checkmark {
            position: absolute;
            top: 0;
            left: 0;
            height: 25px;
            width: 25px;
            background-color: #eee;
            border-radius: 50%;
          }
          .container:hover input ~ .checkmark {
            background-color: #ccc;
          }

          .container input:checked ~ .checkmark {
            background-color: #008000;
          }
          .checkmark:after {
            content: "";
            position: absolute;
            display: none;
          }

          .container input:checked ~ .checkmark:after {
            display: block;
          }
          .container .checkmark:after {
            top: 9px;
           left: 9px;
           width: 8px;
           height: 8px;
           border-radius: 50%;
           background: white;
       }
        /* ##################### Radio Button Style End ################## */

        /* input type=number arrow hide */
        
          input::-webkit-outer-spin-button,
          input::-webkit-inner-spin-button {
          -webkit-appearance: none;
           margin: 0;
        }

        /* ##################### Checkbox Button Style Start ################## */
        
        .form__checkbox-group{
          display:inline-block;
          
        }
        .form__checkbox-label{
          position:relative;
          padding-left:3rem;
        }
        .form__checkbox-button{
          position:absolute;
          left:0;
          width:27px;
          height:27px;
          background-color:transparent;
          border:2px solid #008000;
          display:inline-block;
          
        }
        
        .form__checkbox-button::before{
          content:"";
          width:23px;
          height:23px;
          position:absolute;
          top:0;
          left:0;
          opacity:1;
          background-color:white;
          outline:2px solid #008000n;
          transition:all 0.2s;
        }
        .form__checkbox-input:checked + .form__checkbox-label .form__checkbox-button::before{
          opacity:0;
        }
        .form__checkbox-input{
        display:none;
        }
        /* ##################### Checkbox Button Style End ################## */

        .align-left-u{
          text-align: left;
        }

        .password_nav {
          width: 100%;
          height: 5rem;
          margin-bottom:5rem;
          
        }

        a,a:hover{
          color:white;
          text-decoration:none;
        }

        #resetBtn{
          color:#008000;
          
        }
        </style>
        <title>Welcome</title>
    </head>
    <body class="p-0">
    
    ';
}


?>