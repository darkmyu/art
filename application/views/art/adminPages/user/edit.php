<?
	$tmp = $text1 ? "/text1/$text1/page/$page" : "/page/$page";
?>

<div class="container-fluid">
	<!-- Page Heading -->
	<div class=ml-2>
		<h1 class="h3 mb-2 text-gray-800 font-weight-bold">User Edit</h1>
		<p class="mb-4 font-weight-bold">유저를 수정할 수 있는 페이지입니다.</p>
	</div>

	<form name="form1" method="post" enctype="multipart/form-data">
			<table class="table table-bordered table-sm mymargin5" style="font-size: 10pt">
			<tr>
					<td class="bg-primary text-white text-center font-weight-bold" width="20%" class="info" style="vertical-align:middle">
						<font color="red">*</font> 이름
					</td>
					<td width="80%" align="left">
						<div class="form-inline">
							<input type="text" name="name" class="form-control form-control-sm" style="width:100%" size="20" maxlength="20"	value="<?= $row->name11 ?>">
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
						<font color="red">*</font> 아이디
					</td>
					<td width="80%" align="left">
						<div class="form-inline">
							<input type="text" name="uid" class="form-control form-control-sm" style="width:100%" size="20" maxlength="20"	value="<?= $row->id11 ?>">
						</div>
						<? 
							if (form_error("uid") == true) {
								echo form_error("uid");
							}
						?>
					</td>
				</tr>
				<tr>
					<td class="bg-primary text-white text-center font-weight-bold" width="20%" class="info" style="vertical-align:middle">
						<font color="red">*</font> 암호
					</td>
					<td width="80%" align="left">
						<div class="form-inline">
							<input type="text" name="pwd" class="form-control form-control-sm" style="width:100%" size="20" maxlength="20"	value="<?= $row->pw11 ?>">
						</div>
						<? 
							if (form_error("pwd") == true) {
								echo form_error("pwd");
							}
						?>
					</td>
				</tr>
				<tr>
					<td class="bg-primary text-white text-center font-weight-bold" width="20%" class="info" style="vertical-align:middle">
						등급
					</td>
					<td width="80%" align="left">
						<div class="form-inline">
							<?
								if ($row->rank11 == 0) {
									echo("<input type='radio' name='rank' value='0' checked='checked'>&nbsp;유저&nbsp;&nbsp;");
									echo("<input type='radio' name='rank' value='1'>&nbsp;관리자&nbsp;&nbsp;");
								} else {
									echo("<input type='radio' name='rank' value='0'>&nbsp;유저&nbsp;&nbsp;");
									echo("<input type='radio' name='rank' value='1' checked='checked'>&nbsp;관리자&nbsp;&nbsp;");
								}
							?>
						</div>
					</td>
				</tr>
			</table>

			<div align="center">
				<input type="submit" value="수정" class="btn btn-sm bg-info text-white">
				<a href="/~sale11/art/user/delete/no/<?=$no ?><?= $tmp ?>" class="btn btn-sm bg-danger text-white" onClick="return confirm('<?= $row->name11?>, 삭제할까요?');">
					삭제
				</a>
				<input type="button" value="이전화면" class="btn btn-sm bg-secondary text-white" onClick="location.href='/~sale11/art/user/lists<?= $tmp ?>'">
			</div>
		</form>
</div>