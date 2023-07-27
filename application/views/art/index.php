	<div class="container-fluid pt-5 font-weight-bold mb-2 text-white-50" data-aos="fade" data-aos-delay="500">
		<i class="fas fa-bullhorn"></i>&nbsp 지금 바로 다양한 갤러리를 만나보세요<i class="fas fa-exclamation"></i><br />
	</div>

	<div class="container-fluid" data-aos="fade" data-aos-delay="500">
		<div class="row">
			<?
				foreach ($list as $row) {
			?>
				<div class="col-lg-4">
					<div class="image-wrap-2">
						<div class="image-info">
							<h2 class="mb-3 font-weight-bold"><?= $row->name11 ?></h2>
							<a href="/~sale11/art/photo/lists/text1/<?= $row->name11  ?>" class="btn btn-outline-white py-2 px-4">More Photos</a>
						</div>
						<?
							if ($row->pic11 != '') {
								echo("<img src='/~sale11/img/gallery/thumb/$row->pic11' alt='Image' class='img-fluid'>");
							} else {
								echo("<img src='my2/images/img_1' alt='Image' class='img-fluid'>");
							}
						?>
					</div>
				</div>
			<?
				}
			?>
		</div>
	</div>