<?php
require_once "./vendor/autoload.php";
$chyby = [];
$hlaska = "";
$odeslano = false;
$jmeno = "";
$email = "";
$predmet = "";
$zprava = "";
$formularOdeslan = false;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


/*--Kontaktní formulář--*/

if (array_key_exists("odeslat", $_POST)) {
	$formularOdeslan = true;
	$jmeno = $_POST["jmeno"];
	$email = $_POST["email"];
	$predmet = $_POST["predmet"];
	$zprava = $_POST["zprava"];



	/*--validace-- */
	if(mb_strlen($jmeno) < 3)
	{
		$chyby["jmeno"] = "Jméno musí být zadáno.";
	}
	if (!preg_match("/.+@.+\\..+/", $email))
    {
        $chyby["email"] = "Neplatný email";
    }
	if(mb_strlen($predmet) < 3)
	{
		$chyby["predmet"] = "předmět musí mít více než 3 znaky";
	}
	if(mb_strlen($zprava) < 5 )
	{
		$chyby["zprava"] = "zpráva je příliš krátká";
	}	



  	if(count($chyby) == 0)
	 {
		$odeslano = true;
		
		/*--odesílaní mailu--*/
		$mail = new PHPMailer(true);
		$mail->CharSet = "utf-8";

		//Recipients
		$mail->setFrom($email, $jmeno);
		$mail->addAddress('tomas.hedera@centrum.cz', 'Tomas Hedera');
		//Content
		$mail->isHTML(true);
		$mail->Subject = $predmet;
		$mail->Body    = $zprava;
		

		$mail->send();

	 }

	
	
}
?>
<!DOCTYPE html>
<html lang="cs">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/header.css">
	<link rel="stylesheet" href="css/section.css">
	<link rel="stylesheet" href="css/footer.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="lightbox/css/lightbox.min.css" type="text/css" media="screen"/>
	<script src="lightbox/js/lightbox-plus-jquery.min.js"></script>
	<script src="lightbox/js/lightbox.min.js"></script>
	<title>Tomáš Hedera</title>
</head>

<body>


	<input type="checkbox" name="" id="hamburger-menu">
	<header>
		<menu>
			<div class="container">
				<a class="logo" href="./">
					<img src="img/logo.png" alt="Tomáš Hedera" height="40">
				</a>
				<nav>
					<ul>
						<li><a href="#omne">O mně</a></li>
						<li><a href="#dovednosti">Dovednosti</a></li>
						<li><a href="#reference">Reference</a></li>
						<li><a href="#kontakt">Kontakt</a></li>
					</ul>
				</nav>

				<div class="hamburger-menu">
					<label for="hamburger-menu">
						<div class="linka"></div>
						<div class="linka"></div>
						<div class="linka"></div>
					</label>
				</div>

			</div>
		</menu>
		<div class="headerBottom">
			
			<div class="nadpis">
				<h1>Vítejte na mé stránce</h1>
				<br>
				<p>
					Tento web
					slouží jako ukázka mé práce, zkušeností a dovedností. Prozkoumejte mé projekty,<br>
					dozvíte se více o mých odborných znalostech a neváhejte mě kontaktovat, pokud <br>
					máte jakékoliv otázky. Těším se na případné pracovní příležitosti a spolupráci.
				</p>
				<br>

				<div class="tlacitka">
					<div class="btn">
						<a href="Tomas-hedera_cv.pdf" class="btn-1" target="_blank">Cv</a>
						<a href="#kontakt" class="btn-2">Kontakt</a>
					</div>

					<div class="social">
						<a href="https://www.linkedin.com" target="_blank"><i class="fa-brands fa-linkedin"></i></a>
						<a href="https://github.com/tomas-hedera" target="_blank"><i class="fa-brands fa-github"></i></a>
					</div>
				</div>
			</div>


			<div class="foto">
				<img src="img/mojeFoto.jpg" alt="Tomáš Hedera" width="225" height="300">
			</div>
		</div>
	</header>

	<section>
		<div class="container">
			<div class="omne" id="omne">
				<h2>O mně</h2>
				<p>
					Vítejte na mém prvním webu. Weby se teprve učím psát ale myslím si že to není úplně špatné.
					Jmenuji se Tomáš Hedera a jsem z Tábora.
					Úspěšně jsem dokončil kurz programátor webových aplikací od primakurzy.cz, kde jsem získal 
					znalosti v <b>HTML ,CSS , PHP, Javascriptu, Mysql.</b> Neustále se samostatně vzdělávám z portálu itnetwork.cz, kde rozšiřuji své znalosti a dovednosti <br> 
					v oblasti IT.
				</p>
			</div>

			<div class="dovednosti" id="dovednosti">
				<h2>Dovednosti</h2>
				<p>
					Níže uvedené jazyky jsem se naučil z kurzu programator webových aplikací na <a href="https://www.primakurzyonline.cz/kurz-programator" target="_blank">Primakurzy.cz</a> a <br> 
					samostudiem na <a href="https://www.itnetwork.cz">ITnetwork.cz</a>
				</p>
					<div class="programovaci_jazyky">
						<div class="html"><i class="fa-brands fa-html5"></i>
						<br>
							<span>HTML</span>
							<div class="skill">
								<div class="progress-bar">
									<div class="progress" style="width: 85%;"></div>
									<div class="procenta">85%</div>
								</div>
							</div>
						</div>

						<div class="css"><i class="fa-brands fa-css3-alt"></i>
						<br>
							<span>CSS</span>
						<div class="skill">
								<div class="progress-bar">
									<div class="progress" style="width: 70%;"></div>
									<div class="procenta">70%</div>
								</div>
							</div>
						</div>

						<div class="php"><i class="fa-brands fa-php"></i>
						<br>
							<span>PHP</span>
						<div class="skill">
								<div class="progress-bar">
									<div class="progress" style="width: 50%;"></div>
									<div class="procenta">50%</div>
								</div>
							</div>
						</div>

						<div class="javascript"><i class="fa-brands fa-js"></i>
						<br>
							<span>JS</span>
						<div class="skill">
								<div class="progress-bar">
									<div class="progress" style="width: 30%;"></div>
									<div class="procenta">30%</div>
								</div>
							</div>
						</div>

						<div class="mysql"><i class="fa-solid fa-database"></i>
						<br>
							<span>MySql</span>
						<div class="skill">
								<div class="progress-bar">
									<div class="progress" style="width: 30%;"></div>
									<div class="procenta">30%</div>
								</div>
							</div>
						</div>

					</div>
			</div>

			<div class="reference" id="reference">
				<h2>Reference</h2>
				
				<p>
				Níže mužete vidět ukázky mé práce.
				</p>
					
					<div class="obrazkyPrace">
						<a href="./img/heddyweb.png" rel="lightbox[reference]"><img src="./img/heddyweb_nahled.jpg" alt="tomas hedera web" width="300"></a>
						<a href="./img/osobni_portfolio.jpg" rel="lightbox[reference]"><img src="./img/osobni_portfolio_nahled.jpg" alt="tomas hedera web" width="300" height=""></a>
					</div>
			</div>
		
			<div class="kontakt" id="kontakt">
				<h2>Kontakt</h2>
				<br>
				<ul class="kontaktni_info">
					<li><i class="fa-solid fa-phone"></i> Můžete volat na tel.: <a href="tel:+420723386685">723386685</a></li>
					<li><i class="fa-solid fa-envelope"></i> Psát na email: <a href="mailto:tomas.hedera@centrum.cz">tomas.hedera@centrum.cz</a></li>
					<li><i class="fa-brands fa-wpforms"></i> Nebo můžete využít nasledující formulář</li>
				</ul>
				<?php if($odeslano == false){ ?>
				<div class="formular">
					<form method="post">
						<div class="radka">
							<input class="prvek" type="text" name="jmeno" id="jmeno" placeholder=" " value="<?php echo htmlspecialchars($jmeno) ?>">
							<label for="jmeno">Jméno a příjmení</label>
							<?php
                        $status = " ";
                        if ($formularOdeslan)
                        {
                            $status = "ok";
                            if (array_key_exists("jmeno", $chyby))
                            {
                                $status = "chyba";
                                echo "<div class='chyba'>{$chyby['jmeno']}</div>";
                            }
                        }
                        ?>
							<div class="status <?php echo $status; ?>" >
								<i class="spravne fa-solid fa-check"></i>
								<i class="spatne fa-solid fa-xmark"></i>
							</div>
						</div>

					

						<div class="radka">
							<input class="prvek" type="text" name="email" id="email" placeholder=" " value="<?php echo htmlspecialchars($email) ?>">
							<label for="email">Email</label>
							<?php
							 $status = " ";
								if ($formularOdeslan)
								{
									$status = "ok";
									if (array_key_exists("email", $chyby))
									{
										$status = "chyba";
										echo "<div class='chyba'>{$chyby['email']}</div>";
									}
								}
							?>
							<div class="status <?php echo $status; ?>">
								<i class="spravne fa-solid fa-check"></i>
								<i class="spatne fa-solid fa-xmark"></i>
							</div>
						</div>

						<div class="radka">
							<input class="prvek" type="text" name="predmet" id="predmet" placeholder=" " value = "<?php echo $predmet; ?>">
							<label for="predmet">Předmět</label>
							<?php
								$status = " ";
								if ($formularOdeslan)
								{
									$status = "ok";
									if (array_key_exists("predmet", $chyby))
									{
										$status = "chyba";
										echo "<div class='chyba'>{$chyby['predmet']}</div>";
									}
								}
							?>
							<div class="status <?php echo $status; ?>">
								<i class="spravne fa-solid fa-check"></i>
								<i class="spatne fa-solid fa-xmark"></i>
							</div>
						</div>

						<div class="radka">
							<textarea class="prvek" name="zprava" id="zprava" placeholder=" " value="<?php echo htmlspecialchars($zprava) ?>"></textarea>
							<label for="zprava">Zpráva</label>
							<?php
								$status = " ";
								if ($formularOdeslan)
								{
									$status = "ok";
									if (array_key_exists("zprava", $chyby))
									{
										$status = "chyba";
										echo "<div class='chyba'>{$chyby['zprava']}</div>";
									}
								}
							?>
							<div class="status <?php echo $status; ?>">
								<i class="spravne fa-solid fa-check"></i>
								<i class="spatne fa-solid fa-xmark"></i>
							</div>
						</div>

						<div class="radka">
							<button name="odeslat" >Odeslat</button>
						</div>
					</form>
					<?php
						echo $hlaska;
					?>
				</div>
				<?php  } else
					{echo "<b>Email byl odeslán.</b>";}
				?>
			</div>
		
		</div>
	</div>

	</section>
	<footer>
		Vyrobil &copy;Tomáš Hedera
	</footer>
	<div id="nahoru">
	<i class="fa-solid fa-chevron-up"></i>
	</div>
	<script src="./js/index.js"></script>					
</body>

</html>