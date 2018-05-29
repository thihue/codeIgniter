<html>

<head>
	<!--liên kết đến file head -->
	<?php $this->load->view('trangchu/head') ?>
</head>

<body>
    <?php $this->load->view('trangchu/top') ?>
    <section class="main-content-section">
        <?php $this->load->view($content); ?>
    </section>
    <?php $this->load->view('trangchu/bottom') ?>
</body>
</html>

