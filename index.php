<?php

define('TRICKS', true);

$class = $_GET['class'];
if (!preg_match('/^\w+$/', $class) || !file_exists("classes/$class/details.php")) {
	die('Oh noes!');
}

$details = include("classes/$class/details.php");

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Hunter's Bag of Tricks</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <link type="text/css" rel="stylesheet" href="lib/bootstrap/css/bootstrap-pinkiepie.css" />
        <style type="text/css">
            .spinner {
                width: 30px;
                height: 30px;
                background-color: #333;

                margin: 100px auto;
                -webkit-animation: rotateplane 1.2s infinite ease-in-out;
                animation: rotateplane 1.2s infinite ease-in-out;
            }

            @-webkit-keyframes rotateplane {
                0% { -webkit-transform: perspective(120px) }
                50% { -webkit-transform: perspective(120px) rotateY(180deg) }
                100% { -webkit-transform: perspective(120px) rotateY(180deg)  rotateX(180deg) }
            }

            @keyframes rotateplane {
                0% {
                    transform: perspective(120px) rotateX(0deg) rotateY(0deg);
                    -webkit-transform: perspective(120px) rotateX(0deg) rotateY(0deg)
                } 50% {
                    transform: perspective(120px) rotateX(-180.1deg) rotateY(0deg);
                    -webkit-transform: perspective(120px) rotateX(-180.1deg) rotateY(0deg)
                } 100% {
                    transform: perspective(120px) rotateX(-180deg) rotateY(-179.9deg);
                    -webkit-transform: perspective(120px) rotateX(-180deg) rotateY(-179.9deg);
                }
            }
        </style>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="lib/bootstrap/js/bootstrap.min.js"></script>
        <script src="lib/tricks.js"></script>
		<script src="lib/ace/ace.js" type="text/javascript" charset="utf-8"></script>
    </head>
    <body>
		<div class="container">
			<header>
				<h1 class="page-header">
					<?php echo htmlspecialchars($details['name']); ?>
				</h1>
			</header>
			<section>
				<?php include("classes/$class/body.php"); ?>
			</section>
		</div>
    </body>
</html>
