<div class="site-section"  data-aos="fade">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col">
				<div class="row" style="margin-bottom: 4rem">
					<div class="col-12">
						<h2 class="site-section-heading text-center">Upload your photos!</h2>
						<hr class="bg-white">
					</div>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col mb-5">
				<form name="form1" action="" method="post" enctype="multipart/form-data">
					<div class="row form-group">
						<div class="col-12 text-dark">
							<label class="text-white" for="title">Title</label> 
							<input type="text" id="title" name="title" value="<?= set_value("title") ?>" class="form-control font-weight-bold
								border-top-0 border-left-0 border-right-0" placeholder="제목을 입력하세요!">
							<? 
								if (form_error("title") == true) {
									echo("<small class='text-danger'>");
									echo form_error("title");
									echo("</small>");
								}
							?>
						</div>	

						<div class="col-12 mt-4">
							<label class="text-white" for="content">Content</label> 
							<textarea name="content" id="content" cols="30" rows="7" class="form-control font-weight-bold" placeholder="여러분들의 이야기를 포함시켜보세요!"><?= set_value("content") ?></textarea>
							<? 
								if (form_error("content") == true) {
									echo("<small class='text-danger'>");
									echo form_error("content");
									echo("</small>");
								}
							?>
						</div>

						<div class="col-12 mt-4">
							<label class="text-white" for="gallery_no">Gallery</label> 
							<select name="gallery_no" class="form-control form-control-sm border-top-0 border-left-0 border-right-0">
								<option value="" class="text-dark font-weight-bold">장르 선택</option>
								<?
									$gallery_no = set_value("gallery_no");

									foreach ($gallerys as $row) {
										if ($row->no11 == $gallery_no) {
											echo("<option value='$row->no11' selected class='text-dark font-weight-bold'>$row->name11</option>");
										} else {
											echo("<option value='$row->no11' class='text-dark font-weight-bold'>$row->name11</option>");
										}
									}
								?>
							</select>
							<? 
								if (form_error("gallery_no") == true) {
									echo("<small class='text-danger'>");
									echo form_error("gallery_no");
									echo("</small>");
								}
							?>
						</div>

						<div class="col-md-12 mt-3 input-group">
							<!-- <input type="file"" name="pic" class="form-control form-control-sm" size="20" maxlength="20" value="">
							<label class="text-black" for="gallery_no">Image File</label>  -->
							<div class="custom-file">
								<input type="file" name="pic" class="custom-file-input" id="inputFile" accept="image/*" aria-describedby="inputGroupFileAddon04"
									onchange="setThumb(event);">
								<label class="custom-file-label" for="inputFile">Choose Image_file</label>
							</div>
						</div>

						<div class="col-12 my-2" id="image_container"></div>

						<script>
							function setThumb(event) {
								if (document.querySelector("img#check")) {
									document.querySelector("img#check").remove();
								}

								var reader = new FileReader();

								reader.onload = function(event) {
									console.log(event.target.name);
									var img = document.createElement("img");
									img.setAttribute("src", event.target.result);
									// img.width = 800;
									img.className = "img-fluid";
									img.id = "check";
									document.querySelector("div#image_container").appendChild(img);
								}

								reader.readAsDataURL(event.target.files[0]);
							}

							$("input[type='file']").on('change', function() {
								$(this).next('.custom-file-label').html(event.target.files[0].name);
							});
						</script>

						<div class="col-md-12 mt-2 text-right">
							<input type="submit" value="Upload Photo" class="btn btn-primary py-2 px-4 text-white">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>