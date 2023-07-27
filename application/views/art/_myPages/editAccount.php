<div class="site-section"  data-aos="fade">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col">
				<div class="row" style="margin-bottom: 4rem">
					<div class="col-12">
						<h2 class="site-section-heading text-center">Account Edit</h2>
						<p class="text-center h5">개인정보를 수정하세요!</p>
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
							<label class="text-white" for="name">Name</label> 
							<input type="text" id="name" name="name" value="<?= $row->name11 ?>" class="form-control font-weight-bold
								border-top-0 border-left-0 border-right-0" placeholder="이름을 입력하세요!">
							<? 
								if (form_error("name") == true) {
									echo("<small class='text-danger'>");
									echo form_error("name");
									echo("</small>");
								}
							?>
						</div>	

						<div class="col-12 mt-4">
							<label class="text-white" for="id">Id</label> 
							<input type="text" id="id" name="id" value="<?= $row->id11 ?>" class="form-control font-weight-bold
								border-top-0 border-left-0 border-right-0 bg-dark" placeholder="아이디를 입력하세요!" readonly>
						</div>

						<div class="col-12 mt-4">
							<label class="text-white" for="pw">Password</label> 
							<input type="password" id="pw" name="pw" value="<?= set_value("pw") ?>" class="form-control font-weight-bold
								border-top-0 border-left-0 border-right-0" placeholder="현재 비밀번호를 입력하세요!">
							<?
								if ($message) {
									echo("<div class='form-group'><small class='text-danger align-middle'>$message</small></div>");
								}
							?>
							<? 
								if (form_error("pw") == true) {
									echo("<small class='text-danger'>");
									echo form_error("pw");
									echo("</small>");
								}
							?>
						</div>

						<div class="col-12 mt-4">
							<label class="text-white" for="npw">New Password&nbsp<input type="checkbox" name="check"></label>
							<input type="password" id="npw" name="npw" value="<?= set_value("npw") ?>" class="form-control font-weight-bold
								border-top-0 border-left-0 border-right-0" placeholder="새 비밀번호를 입력하세요! (비밀번호 변경을 원하시면 체크박스를 체크해주세요)">
							<? 
								if (form_error("npw") == true) {
									echo("<small class='text-danger'>");
									echo form_error("npw");
									echo("</small>");
								}
							?>
						</div>

						<div class="col-md-12 mt-2 text-right">
							<input type="submit" value="Update Account" class="btn btn-primary py-2 px-4 text-white">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>