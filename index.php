<?php
require_once 'users/init.php';
require_once $abs_us_root.$us_url_root.'users/includes/template/prep.php';
?>

<?php

	if ($user->isLoggedIn()) {?>
<script type="text/javascript" src="https://unpkg.com/amazon-quicksight-embedding-sdk@1.0.1/dist/quicksight-embedding-js-sdk.min.js"></script>
<script type="text/javascript">
        function embedDashboard() {
            var containerDiv = document.getElementById("dashboardContainer");
            var params = {
                url: "<?php 
$response = file_get_contents('http://internal-Socialhi5-Apptier-ALB-1895237273.us-west-2.elb.amazonaws.com');
echo $response; ?>",
                container: containerDiv,
                parameters: {
                    country: 'United States'
                },
                height: "1140px",
                width: "1140px"
            };
            var dashboard = QuickSightEmbedding.embedDashboard(params);
            dashboard.on('error', function() {});
            dashboard.on('load', function() {});
            //dashboard.setParameters({country: 'Canada'});
        }
    </script>
<?php } ?>

<div>
			<?php
				if($user->isLoggedIn()){?>
					<div id="dashboardContainer"></div>
					<script type="text/javascript">embedDashboard();</script>
				<?php }else{?>
					<h3>Please <a href="users/login.php">login</a> to view details</h3>
				<?php }?>


</div>

<div id="page-wrapper">
	<div class="container">
		
			<?php languageSwitcher();?>
		</div>
	</div>

	<!-- Place any per-page javascript here -->


	<?php require_once $abs_us_root . $us_url_root . 'users/includes/html_footer.php'; ?>
