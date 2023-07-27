<?
	$tmp = $text1 ? "/text1/$text1/page/$page" : "/page/$page";
?>

<div class="container-fluid">
	<!-- Page Heading -->
	<div class=ml-2>
		<h1 class="h3 mb-2 text-gray-800 font-weight-bold">Picture Edit</h1>
		<p class="mb-4 font-weight-bold">유저들의 사진을 수정할 수 있는 페이지입니다.</p>
	</div>

	<form name="form1" method="post" enctype="multipart/form-data">
			<table class="table table-bordered table-sm mymargin5" style="font-size: 10pt">
				<tr>
					<td class="bg-primary text-white text-center font-weight-bold" width="20%" class="info" style="vertical-align:middle">
						작성자
					</td>
					<td width="80%" align="left">
						<div class="form-inline">
							<input type="text" name="name" readonly class="form-control form-control-sm" style="width:100%" size="50" maxlength="50"	value="<?= $row->user_name11 ?>">
						</div>
					</td>
				</tr>
				<tr>
					<td class="bg-primary text-white text-center font-weight-bold" width="20%" class="info" style="vertical-align:middle">
						<font color="red">*</font> 제목
					</td>
					<td width="80%" align="left">
						<div class="form-inline">
							<input type="text" name="title"" class="form-control form-control-sm" style="width:100%" size="100" maxlength="100"	value="<?= $row->title11 ?>">
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
							<textarea type="text" name="content" class="form-control form-control-sm" style="width:100%" size="20" maxlength="20"><?= $row->content11 ?></textarea>
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
									foreach ($gallerys as $row1) {
										if ($row1->no11 == $row->gallery_no11) {
											echo("<option value='$row1->no11' selected>$row1->name11</option>");
										} else {
											echo("<option value='$row1->no11'>$row1->name11</option>");
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
						<?
							if ($row->pic11) {
								echo("<img src='/~sale11/img/picture_thumb/$row->pic11' width='600' class='img-fluid img-thumbnail'>");
							} else {
								echo("<img src='' width='600' class='img-fluid img-thumbnail'>");
							}
						?>
					</td>
				</tr>	
			</table>

			<div align="center">
				<input type="submit" value="수정" class="btn btn-sm bg-info text-white">
				<a href="/~sale11/art/picture/delete/no/<?=$no ?><?= $tmp ?>" class="btn btn-sm bg-danger text-white" onClick="return confirm('<?= $row->title11?>, 삭제할까요?');">
					삭제
				</a>
				<input type="button" value="이전화면" class="btn btn-sm bg-secondary text-white" onClick="location.href='/~sale11/art/picture/lists<?= $tmp ?>'">
			</div>
		</form>
</div>