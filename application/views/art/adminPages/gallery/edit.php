<?
	$tmp = $text1 ? "/text1/$text1/page/$page" : "/page/$page";
?>

<div class="container-fluid">
	<!-- Page Heading -->
	<div class=ml-2>
		<h1 class="h3 mb-2 text-gray-800 font-weight-bold">Gallery Edit</h1>
		<p class="mb-4 font-weight-bold">갤러리를 수정할 수 있는 페이지입니다.</p>
	</div>

	<form name="form1" method="post" enctype="multipart/form-data">
			<table class="table table-bordered table-sm mymargin5" style="font-size: 10pt">
				<tr>
					<td class="bg-primary text-white text-center font-weight-bold" width="20%" class="info" style="vertical-align:middle">
						<font color="red">*</font> 이름
					</td>
					<td width="80%" align="left">
						<div class="form-inline">
							<input type="text" name="name" class="form-control form-control-sm" style="width:100%" size="20" maxlength="20"
								value="<?= $row->name11 ?>">
						</div>
						<? 
							if (form_error("name") == true) {
								echo form_error("name");
							}
						?>
					</td>
				</tr>
				<tr>
					<td class="bg-primary text-white text-center font-weight-bold" width="20%" class="info" style="vertical-align:middle">
						썸네일
					</td>
					<td width="80%" align="left">
						<div class="form-inline">
							<input type="file"" name="pic" class="form-control form-control-sm" size="20" maxlength="20" value="">
						</div>
						<?
							if ($row->pic11) {
								echo("<img src='/~sale11/img/gallery/thumb/$row->pic11' width='600' class='img-fluid img-thumbnail'>");
							} else {
								echo("<img src='' width='600' class='img-fluid img-thumbnail'>");
							}
						?>
					</td>
				</tr>
			</table>

			<div align="center">
				<input type="submit" value="수정" class="btn btn-sm bg-info text-white">
				<a href="/~sale11/art/gallery/delete/no/<?=$no ?><?= $tmp ?>" class="btn btn-sm bg-danger text-white" onClick="return confirm('<?= $row->name11?>, 삭제할까요?');">
					삭제
				</a>
				<input type="button" value="이전화면" class="btn btn-sm bg-secondary text-white" onClick="location.href='/~sale11/art/gallery/lists<?= $tmp ?>'">
			</div>
		</form>
</div>