
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<?php
$output = null;
$curl = curl_init();

curl_setopt_array($curl, [
	CURLOPT_URL => "https://movie-database-alternative.p.rapidapi.com/?s=Avengers%20Endgame&r=json&page=1",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => [
		"X-RapidAPI-Host: movie-database-alternative.p.rapidapi.com",
		"X-RapidAPI-Key: bb323f6566msh1719294379541aep1acbb2jsn9f63cb8a574f"
	],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
	// echo $response;
    $output = json_decode($response);
    // echo $output->totalResults; 
}

?>

<?php foreach($output->Search as $item){ ?>
<!-- <div>
    <h1></h1>
    <h2><?php #echo $item->Year; ?></h2>
    <img src="<?php #echo $item->Poster; ?>" alt="">
</div> -->

<div class="panel panel-default">
  <div class="panel-heading"><?php echo $item->Title; ?></div>
  <div class="panel-body">
  <?php echo $item->Year; ?>
  <br>
  <img src="<?php echo $item->Poster; ?>" alt="">
  <br>
  
  <?php echo $item->imdbID; ?>

  </div>
</div>

<?php } ?>