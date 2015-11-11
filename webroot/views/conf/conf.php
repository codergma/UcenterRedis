<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>配置文件</title>
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    </style>
  </head>
  <body>
<div class="container">
	<div class="h3">url辅助函数</div>
	<div class="table-reponsive">
		<table class="table table-bordered text-center">
			<thead>
				<th>函数</th>
				<th>输出</th>
			</thead>
			<tbody>
			<?php
				$i = 0;
				foreach ($url as $key => $value)
				{
					$tr_class = $i%2 ? 'active':'success';
					$html = "<tr class='".$tr_class."'>";
					$html .= "<td>".$key."</td>";
					$html .= "<td>".$value."</td>";
					$html .= "</tr>";
					$i++;
					echo $html;
				}
			?>

			</tbody>
		</table>
	</div>
	<div class="h3">路径辅助函数</div>
	<div class="table-reponsive">
		<table class="table table-bordered text-center">
			<thead>
				<th>函数</th>
				<th>输出</th>
			</thead>
			<tbody>
			<?php
				$i = 0;
				foreach ($path as $key => $value)
				{
					$tr_class = $i%2 ? 'active':'success';
					$html = "<tr class='".$tr_class."'>";
					$html .= "<td>".$key."</td>";
					$html .= "<td>".$value."</td>";
					$html .= "</tr>";
					$i++;
					echo $html;
				}
			?>

			</tbody>
		</table>
	</div>
	<div class="h3">生成验证码</div>
	<div class="table-reponsive">
		<table class="table table-bordered text-center">
			<thead>
				<th>key</th>
				<th>value</th>
			</thead>
			<tbody>
			<?php
				$i = 0;
				foreach ($captcha as $key => $value)
				{
					$tr_class = $i%2 ? 'active':'success';
					$html = "<tr class='".$tr_class."'>";
					$html .= "<td>".$key."</td>";
					$html .= "<td>".$value."</td>";
					$html .= "</tr>";
					$i++;
					echo $html;
				}
			?>

			</tbody>
		</table>
	</div>
</div>
    <script src="/jquery/jquery-1.11.3.min.js"></script>
    <script src="/jquery/jquery.form.js"></script>
    <script src="/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>