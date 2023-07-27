<?
	$tmp = $text1 ? "/text1/$text1/page/$page" : "/page/$page";
?>

<div class="container-fluid">
	<!-- Page Heading -->
	<div class=ml-2>
		<h1 class="h3 mb-2 text-gray-800 font-weight-bold">Users Add</h1>
		<p class="mb-4 font-weight-bold">유저를 추가할 수 있는 페이지입니다.</p>
	</div>

	<form name="form1" method="post" enctype="multipart/form-data">
			<table class="table table-bordered table-sm" style="font-size: 10pt">
				<tr>
					<td class="bg-primary text-white text-center font-weight-bold" width="20%" class="info" style="vertical-align:middle">
						<font color="red">*</font> 이름
					</td>
					<td width="80%" align="left">
						<div class="form-inline">
							<input type="text" name="name" class="form-control form-control-sm" style="width:100%" size="20" maxlength="20"	value="<?= set_value("name") ?>">
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
							<input type="text" name="uid" class="form-control form-control-sm" style="width:100%" size="20" maxlength="20"	value="<?= set_value("uid") ?>">
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
							<input type="text" name="pwd" class="form-control form-control-sm" style="width:100%" size="20" maxlength="20"	value="<?= set_value("pwd") ?>">
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
							<input type="radio" name="rank" value="0" checked="checked">&nbsp;유저&nbsp;&nbsp;
							<input type="radio" name="rank" value="1">&nbsp;관리자&nbsp;&nbsp;
						</div>
					</td>
				</tr>
			</table>

			<div align="center">
				<input type="submit" value="저장" class="btn btn-sm bg-info text-white">
				<input type="button" value="이전화면" class="btn btn-sm bg-secondary text-white" onClick="location.href='/~sale11/art/user/lists<?= $tmp ?>'">
			</div>
		</form>
</div>