
<!-- To improve the project: https://www.qwant.com/?q=validation+de+formulaire+en+php&client=ext-firefox-sb&t=web -->

<?php include_once "header.php" ?>
		<form action="<?= htmlspecialchars($_SERVER['PHP_SELF'])?>" method="GET" class="registration-form"  novalidate="novalidate">
			<!-- Header -->
			<div class="form-header">
				<h1 class="form-header-h1">Registration form</h1>
			</div>
			<!-- Content -->
			<div class="form-content">
					<span class="error"><?= $errors['username']  ?></span>
					<input type="text" name="username" id="username" placeholder="Username" value="<?= htmlspecialchars($_GET['username'] ?? "") ?>" class="inputs">

					<span class="error"><?= $errors['email']  ?></span>
					<input type="email" name="email" id="email" placeholder="Email" value="<?= htmlspecialchars($_GET['email'] ?? "") ?>" class="inputs">

					<span class="error"><?= $errors['password']  ?></span>
					<input type="password" name="password" id="password" placeholder="Password" value="<?= htmlspecialchars($_GET['password'] ?? "") ?>"  class="inputs">

					<span class="error"><?= $errors['conf_password']  ?></span>
					<input type="password" name="conf_password" id="conf-password" placeholder="Confirm password" value="<?= htmlspecialchars($_GET['conf_password'] ?? "") ?>"   class="inputs">
				<p>
					<!-- in PHP tag: Code to memorize value of checkbox -->
					<input type="checkbox" name="box" id="box" value="TOS" <?php if(@$_GET['box'] === 'TOS') echo 'checked';?>> I agree to the <a href="javascript:void(0)" class="links">Terms of Services</a> and <a href="#" class="links">Privacy Policy</a>
					<span class="error"><?= $errors['box']  ?></span>
				</p>
				<input type="submit" name="submit" value="Create account" class="submit-btn" >
			</div>
			<!-- Footer -->
			<div class="form-footer">
				<p class="form-footer-p">&copy; First <abbr title="Back end">(B)</abbr> project</p>
			</div>
		</form>	
	</body>
</html>
