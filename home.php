<?php
// Php script to fetch testimonials

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <style>
        /* gray: #f9f9f7 */
        * {
            margin: 0;
            box-sizing: border-box;
            font-family: sans-serif;
            color: #454545;
        }

        html {
            scroll-behavior: smooth;
            background-color: #f9f9f7;
        }


        nav {
            height: 4rem;
            position: fixed;
            width: 100%;
            z-index: 100;
        }

        .nav-main {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
        }

        .nav-sub {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 75%;
            padding: 1rem;
            margin: 1rem 0rem;
            box-shadow: 0rem 0rem 0.1rem 0rem;
            background: #fff;
        }

        .links {
            list-style: none;
            padding: 0;
            display: flex;
            justify-content: space-around;
            width: 50%;
        }

        .links a {
            color: #ff652f;
            text-decoration: none;
            cursor: pointer;
            padding-bottom: 0.8rem;
            border-bottom: none;
        }

        .links a:hover {
            border-bottom: 0.3rem solid #ff652f;
        }

        .auth-container {
            list-style: none;
            display: flex;
            width: 75%;
            flex-direction: row-reverse;
        }

        .auth-container li {
            margin: 0.5rem;
        }

        .auth-container li a {
            text-decoration: none;
            padding: 1rem;
            background: #ff652f;
            color: white;
            border-radius: 0.3rem;
        }

        .auth-container li a.login {
            background: #fff;
            box-shadow: 0rem 0rem 0.1rem 0rem;
            color: #454545;
        }



        .home-container {
            display: flex;
            align-items: center;
            width: 80%;
            justify-content: center;
        }

        .images-slideshow {
            height: 20rem;
            width: 40%;
            display: flex;
            position: relative;
            overflow: hidden;
        }

        .images-slideshow img {
            height: 100%;
            width: 100%;
            position: absolute;
            top: 0;
            left: 0;
            transition: 0.8s ease-in-out;
        }

        .images-slideshow img:nth-child(2) {
            left: 100%;
        }

        .images-slideshow img:nth-child(3) {
            left: 200%;
        }


        .main-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .home-info {
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            height: 100%;
            width: 50%;
            padding: 0.4rem;
        }

        button {
            width: fit-content;
            padding: 0.5rem;
            background: #ff652f;
            color: white;
            border: #ff652f;
            cursor: pointer;
        }

        #about {
            flex-direction: column;
        }

        h2 {
            padding-bottom: 0.1rem;
            border-bottom: 0.3rem solid #ff652f;
            margin: 1rem 0rem;
        }

        #about p {
            width: 60%;
            text-align: center;
        }

        #features {
            padding: 5rem 0rem;
        }

        .features-container {
            display: flex;
            flex-direction: column;
            margin: 1rem 2rem;
        }

        .feature {
            display: flex;
            align-items: center;
        }

        #right {
            justify-content: end;
        }

        #testimonies {
            flex-direction: column;
        }

        .testimony-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .testimony {
            padding: 1rem;
            height: 10rem;
            width: 40%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            box-shadow: 0rem 0rem 0.1rem 0rem;
            margin: 1rem;
        }

        #pricing {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 5rem 0rem;
        }

        #pricing p {
            margin: 1rem 0rem;
        }

        .plan-container {
            display: flex;
            justify-content: space-around;
        }

        .plan {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
            width: 30%;
        }

        .plan img {
            width: 100%;
        }

        .plan h4 {
            margin: 0.5rem 0rem;
        }

        .plan ul {
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            padding: 0rem;
            height: 100%;
            margin: 1rem 0rem;
        }

        footer {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 3rem;
            background-color: #454545;
        }

        footer ul {
            list-style: none;
        }

        footer ul li a {
            color: white;
            text-decoration: none;
            font-size: 0.8rem;
        }

        footer h4 {
            color: white;
            margin-left: 2rem;
        }
    </style>
    <nav>
        <div class='nav-main'>
            <div class='nav-sub'>
                <div>
                    <h3 style="color: #ff652f;">i-max technologies</h3>
                </div>
                <ul class='links'>
                    <li><a href="#home">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#features">Features</a></li>
                    <li><a href="#testimonies">Testimonies</a></li>
                    <li><a href="#pricing">Pricing</a></li>
                </ul>
            </div>
            <ul class='auth-container'>
                <li><a href='auth/register/register.php'>Sign Up</a></li>
                <li><a href='auth/login/login.php' class='login'>Login</a></li>
            </ul>
        </div>
    </nav>
    <div id='home' class="main-container">
        <div class='home-container'>
            <div class='images-slideshow'>
                <img src="admin/assets/img/blog/img04.png" alt="">
                <img src="admin/assets/img/blog/img05.png" alt="">
                <img src="admin/assets/img/blog/img06.png" alt="">
            </div>
            <div class='home-info'>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eveniet ex iusto in eius corrupti non debitis minima illum, est harum asperiores, praesentium cupiditate at soluta ratione enim, inventore eaque reprehenderit.</p>
                <button type='button'>Learn More</button>
            </div>
        </div>
    </div>
    <div id='about' class="main-container">
        <h2>About</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati doloremque quasi quo voluptatem laboriosam voluptate recusandae velit accusantium voluptas numquam pariatur maiores inventore officiis, natus, aliquam delectus nisi voluptatibus exercitationem sed magni! Eos reiciendis molestiae mollitia ipsa nisi laboriosam tenetur veniam, enim vitae quasi, incidunt illum nostrum quis dignissimos? Itaque magnam unde necessitatibus beatae pariatur doloribus, laboriosam aut debitis quaerat?</p>
    </div>
    <div id='features'>
        <div style='display: flex;
            justify-content: center;'>
            <h2>Features</h2>
        </div>
        <div class='features-container'>
            <div class='feature' id='left'>
                <img src="admin/assets/img/blog/img03.png" alt="comp">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            </div>
            <div class='feature' id='right'>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                <img src="admin/assets/img/blog/img03.png" alt="comp">
            </div>
            <div class='feature' id='left'>
                <img src="admin/assets/img/blog/img03.png" alt="comp">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            </div>
            <div class='feature' id='right'>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                <img src="admin/assets/img/blog/img03.png" alt="comp">
            </div>
        </div>
    </div>
    <div id='testimonies' class="main-container">
        <div>
            <h2>Testimonies</h2>
        </div>
        <div class='testimony-container'>
            <div class='testimony'>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Magnam, mollitia?</p>
                <span>Dusan vlahovic</span>
            </div>
            <div class='testimony'>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Magnam, mollitia?</p>
                <span>Dusan vlahovic</span>
            </div>
            <div class='testimony'>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Magnam, mollitia?</p>
                <span>Dusan vlahovic</span>
            </div>
            <div class='testimony'>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Magnam, mollitia?</p>
                <span>Dusan vlahovic</span>
            </div>
        </div>
    </div>
    <div id='pricing'>
        <div>
            <h2>Pricing</h2>
        </div>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem, minus!</p>
        <div class='plan-container'>
            <div class='plan'>
                <img src="admin/assets/img/blog/img03.png" alt="comp" />
                <h4>Basic plan</h4>
                <ul>
                    <li>Lorem, ipsum dolor.</li>
                    <li>Lorem, ipsum dolor.</li>
                    <li>Lorem, ipsum dolor.</li>
                    <li>Lorem, ipsum dolor.</li>
                </ul>
                <button type='button'>Subscribe</button>
            </div>
            <div class='plan'>
                <img src="admin/assets/img/blog/img03.png" alt="comp" />
                <h4>Standard plan</h4>
                <ul>
                    <li>Lorem, ipsum dolor.</li>
                    <li>Lorem, ipsum dolor.</li>
                    <li>Lorem, ipsum dolor.</li>
                    <li>Lorem, ipsum dolor.</li>
                    <li>Lorem, ipsum dolor.</li>
                    <li>Lorem, ipsum dolor.</li>
                </ul>
                <button type='button'>Subscribe</button>
            </div>
            <div class='plan'>
                <img src="admin/assets/img/blog/img03.png" alt="comp" />
                <h4>Premium</h4>
                <ul>
                    <li>Lorem, ipsum dolor.</li>
                    <li>Lorem, ipsum dolor.</li>
                    <li>Lorem, ipsum dolor.</li>
                    <li>Lorem, ipsum dolor.</li>
                    <li>Lorem, ipsum dolor.</li>
                    <li>Lorem, ipsum dolor.</li>
                    <li>Lorem, ipsum dolor.</li>
                    <li>Lorem, ipsum dolor.</li>
                </ul>
                <button type='button'>Subscribe</button>
            </div>
        </div>
    </div>
    <footer id='footer'>
        <ul id='links'>
            <h2 style="color: white;">Church</h2>
            <li><a href="#">Home</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="#">Testimonies</a></li>
            <li><a href="#">Our Product</a></li>
        </ul>
        <ul id='contact'>
            <h2 style="color: white;">Contacts</h2>
            <li><a href="#">Facebook</a></li>
            <li><a href="#">Twitter</a></li>
            <li><a href="#">LinkedIn</a></li>
            <li><a href="#">WhatsApp</a></li>
        </ul>
        <h4>i-max technologies &copy; 2022</h4>
    </footer>
    <script src='public//assets/slideshow.js'></script>
</body>

</html>