<?
	$tmp = $text1 ? "/text1/$text1" : "";
?>

<div class="container-fluid mt-5">

	<div class="row justify-content-center">
		<div class="col-md-7 mb-4" data-aos='fade'>
			<div class="row mb-4">
				<div class="col-12">
					<h2	h2 class="site-section-heading text-center">Photos</h2>
					<form name="form1">
						<div class="text-center">
							<input type="text" id="text1" name="text1" class="form-control text-center border-3 border-secondary border-top-0 border-left-0 border-right-0" style="width:100%;" 
							placeholder="갤러리 태그로 검색해보세요!" value="<?= $text1 ?>"  onkeydown="if (event.keyCode == 13) { find_text(); }"><br />
							<?
								echo("<button class='btn-sm mx-1 px-2 mt-2' style='background-color: #3b3b3b; border: none;'>");
								echo("<a href='/~sale11/art/photo/lists' class='text-white font-weight-bold'>#&nbsp모두&nbsp</a>");
								echo("</button>");

								foreach ($gallerys as $row1) {
									echo("<button class='btn-sm mx-1 px-2 mt-2' style='background-color: #3b3b3b; border: none;'>");
									echo("<a href='/~sale11/art/photo/lists/text1/$row1->name11' class='text-white font-weight-bold'>#&nbsp$row1->name11&nbsp</a>");
									echo("</button>");
								}
							?>
						</div>
					</form>
				</div>
			</div>

			<a href="/~sale11/art/post/add" class="col btn font-weight-bold text-dark mb-5 border border-secondary bg-white rounded">여러분들의 사진을 공유해보세요!</a>
		</div>
		<!-- <div class='row'>
			<div class='col-8'>
				<a href='/~sale11/art'>
					<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
						<path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
						<path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
					</svg>
				</a>
			</div>
			<div class='col-4 text-right'>
				<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-eye-fill' viewBox='0 0 16 16'>
					<path d='M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z'/>
					<path fill-rule='evenodd' d='M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z'/>
				</svg>
				<small>$row->view11</small>
			</div>
		</div> -->

		<div class="row mx-2" id="lightgallery">
			<? $text1 ?>
			<?
				$page = 0;
				foreach ($list as $row) {
					echo("
						<div class='col-sm-6 col-md-4 col-lg-3 col-xl-3 item' data-aos='fade' data-src='/~sale11/img/picture/$row->pic11' 
							data-sub-html='<h4>$row->title11</h4><p>$row->content11</p><small>made in - $row->user_name11&nbsp/ <a href=\"/~sale11/art/photo/lists/text1/$row->gallery_name11\">tag: $row->gallery_name11</a></small>'>	
								<div class='row'>
									<div class='col text-right'>
										<small class='align-center'>
											$row->user_name11
											<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
												<path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
												<path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
											</svg>
										</small>
									</div>
								</div>

								<a href='#'>
									<img src='/~sale11/img/picture_thumb/$row->pic11' alt='IMage' class='img-fluid'>
								</a>
						</div>
					");

					$page++;
			?>

			<?
				}
			?>
		</div>
	</div>
</div>


<!-- <div class=''' data-aos='fade' data-src='/~sale11/img/picture/$row->pic11' 
								data-sub-html='<h4>$row->title11</h4><p>$row->content11</p><small>made in - $row->user_name11&nbsp/ <a href=\"/~sale11/art/photo/lists/text1/$row->gallery_name11\">tag: $row->gallery_name11</a></small>'>	
									<a href='#'><img src='/~sale11/img/picture_thumb/$row->pic11' alt='IMage' class='img-fluid'></a>
							</div> -->

<script>
	function find_text() {
		if (!form1.text1.value) {
			form1.action = "/~sale11/art/photo/lists";
		} else {
			form1.action = "/~sale11/art/photo/lists/text1/" + form1.text1.value;
		}
	}
</script>