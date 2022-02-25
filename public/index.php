<!-- Import codes from process and header files -->
<?php include_once '../process.php'?>
<?php include_once '../header.php' ?>

<!-- Import Bootstrap CSS   -->
<link rel="stylesheet" href="assets/bootstrap-5.0.2-dist/css/bootstrap.min.css">
</head>
<body class='d-flex justify-content-center align-items-center bg-success bg-gradient' style='width:100%; min-height:100vh;'>

<!-- Registration form -->
<form action="<?= htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST" class="container-sm m-5 p-5 border rounded-3 bg-light bg-gradient shadow-lg w-50" novalidate>

	<!-- Form header -->
	<header class="mb-3">
		<h1 class="fs-1 text-muted text-center mb-3">Registration</h1>
	</header>

	<!-- Required fields -->
	<!-- Username  -->
	<p class="mb-3">
		<input type="text" name="username" id="username" placeholder="Username" value="<?= htmlspecialchars($_POST['username'] ?? "") ?>" class="form-control">
		<span class="text-danger"><?= $errors['username'] ?></span>
	</p>

	<!-- Em@il -->
	<p class="mb-3">
		<input type="email" name="email" id="email" placeholder="Em@il" value="<?= htmlspecialchars($_POST['email'] ?? "") ?>" class="form-control">
		<span class="text-danger"><?= $errors['email'] ?></span>
	</p>

	<!-- Password -->
	<p class="mb-3">
		<input type="password" name="password" id="password" placeholder="Passsword" value="<?= htmlspecialchars($_POST['password'] ?? "") ?>" class="form-control">
		<span class="text-danger"><?= $errors['password'] ?></span>
	</p>

	<!-- Confirm password -->
	<p class="mb-3">
		<input type="password" name="password" id="password" placeholder="Enter your password again" value="<?= htmlspecialchars($_POST['conf_password'] ?? "") ?>" class="form-control">
		<span class="text-danger"><?= $errors['conf_password'] ?></span>
	</p>

	<!-- TOS -->	
	<p class="form-check">
		<input type='checkbox' name='tos' id='tos' value='TOS' class='form-check-input' <?php followUserDecision(); ?> > I agree to the <a class='text-success' href='javascript:void(0)'>Terms of Services</a> and <a class='text-success' href='#'>Privacy Policy</a>
		<span class='d-block text-danger'><?= $errors['tos'] ?></span>
	</p>
	<p class="d-flex justify-content-center mt-3">
		<input type='submit' name='submit' value='Create account' class='btn btn-success'>
	</p>

<!-- Import Bootstrap JS   -->
<script src="assets/bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>