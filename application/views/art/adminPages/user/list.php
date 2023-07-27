<?
	$tmp = $text1 ? "/text1/$text1/page/$page" : "/page/$page";
?>

<div class="container-fluid">
	
	<!-- Page Heading -->
	<div class=ml-2>
		<h1 class="h3 mb-2 text-gray-800 font-weight-bold">User List</h1>
		<p class="mb-4 font-weight-bold">유저 추가, 수정, 삭제 등을 관리할 수 있는 페이지입니다.</p>
	</div>

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<div class="row mb-2">
				<p class="col-sm m-0 font-weight-bold text-primary">유저 목록</p>
				<a href="/~sale11/art/user/add<?= $tmp ?>" class="mr-3 btn btn-outline-primary">추가</a>
			</div>
			<form name="form1" method="post" action="">
				<input type="text" class="form-control" placeholder="이름을 검색하세요." name="text1" value="<?=$text1 ?>" onkeydown="if (event.keyCode == 13) { find_text(); }">
			</form>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>ID</th>
							<th>이름</th>
							<th>아이디</th>
							<th>암호</th>
							<th>등급</th>
						</tr>
					</thead>
					<tbody>
						<?php
							foreach ($list as $row) {
								if ($row->rank11 == 0) {
									$rank = "유저";
								} else {
									$rank = "관리자";
								}

								echo("<tr>");
								echo("<td width='20%'>$row->no11</td>");
								echo("<td width='20%'><a href='/~sale11/art/user/edit/no/$row->no11$tmp'>$row->name11</a></td>");
								echo("<td width='20%'>$row->id11</td>");
								echo("<td width='20%'>$row->pw11</td>");
								echo("<td width='20%'>$rank</td>");
								echo("</tr>");
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<?= $pagination ?>
</div>

<script>
	function find_text() {
		if (!form1.text1.value) {
			form1.action = "/~sale11/art/user/lists";
		} else {
			form1.action = "/~sale11/art/user/lists/text1/" + form1.text1.value;
		}

		form1.submit();
	}
</script>