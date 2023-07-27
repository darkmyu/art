<?
	$tmp = $text1 ? "/text1/$text1/page/$page" : "/page/$page";
?>

<div class="container-fluid">
	<!-- Page Heading -->
	<div class=ml-2>
		<h1 class="h3 mb-2 text-gray-800 font-weight-bold">Picture Add</h1>
		<p class="mb-4 font-weight-bold">사진을 추가할 수 있는 페이지입니다.</p>
	</div>

	<form name="form1" method="post" enctype="multipart/form-data">
			<table class="table table-bordered table-sm mymargin5" style="font-size: 10pt">
				<tr>
					<td class="bg-primary text-white text-center font-weight-bold" width="20%" class="info" style="vertical-align:middle">
						<font color="red">*</font> 제목
					</td>
					<td width="80%" align="left">
						<div class="form-inline">
							<input type="text" name="title"" class="form-control form-control-sm" style="width:100%" size="50" maxlength="50"	value="<?= set_value("title") ?>">
						</div>
						<? 
							if (form_error("title") == true) {
								echo form_error("title");
							}
						?>
					</td>
				</tr>
				<tr>
					<td class="bg-primary text-white text-center font-weight-bold" width="20%" class="info" style="vertical-align:middle">
						<font color="red">*</font> 본문
					</td>
					<td width="80%" align="left">
						<div class="form-inline">
							<textarea type="text" name="content" class="form-control form-control-sm" style="width:100%" size="100" maxlength="100"	value="<?= set_value("content") ?>"></textarea>
						</div>
						<? 
							if (form_error("content") == true) {
								echo form_error("content");
							}
						?>
					</td>
				</tr>
				<tr>
					<td class="bg-primary text-white text-center font-weight-bold" width="20%" class="info" style="vertical-align:middle">
						<font color="red">*</font> 장르
					</td>
					<td width="80%" align="left">
						<div class="form-inline">
							<select name="gallery_no" class="form-control form-control-sm">
								<option value="">선택하세요</option>
								<?
									$gallery_no = set_value("gallery_no");

									foreach ($gallerys as $row) {
										if ($row->no11 == $gallery_no) {
											echo("<option value='$row->no11' selected>$row->name11</option>");
										} else {
											echo("<option value='$row->no11'>$row->name11</option>");
										}
									}
								?>
							</select>
						</div>
						<? 
							if (form_error("gallery_no") == true) {
								echo form_error("gallery_no");
							}
						?>
					</td>
				</tr>
				<tr>
					<td class="bg-primary text-white text-center font-weight-bold" width="20%" class="info" style="vertical-align:middle">
						사진
					</td>
					<td width="80%" align="left">
						<div class="form-inline">
							<input type="file"" name="pic" class="form-control form-control-sm" size="20" maxlength="20" value="">
						</div>
					</td>
				</tr>	
			</table>

			<div align="center">
				<input type="submit" value="저장" class="btn btn-sm bg-info text-white">
				<input type="button" value="이전화면" class="btn btn-sm bg-secondary text-white" onClick="location.href='/~sale11/art/picture/lists<?= $tmp ?>'">
			</div>
		</form>
</div>